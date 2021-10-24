<?php

namespace App\Http\Controllers\admin;

use App\Events\ExamAddedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use Exception;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;
use function Symfony\Component\String\b;

class adminExamController extends Controller
{

    function index()
    {


        $data['exams']= Exam::orderBy('id','desc')->paginate(8);

         return view('admin.exam.index')->with($data);

    }



    function show(Exam $exam)
    {
         $data['exam']=$exam;


         return view('admin.exam.show')->with($data);
    }




    function showQuestions(Exam $exam)
    {
         $data['exam']=$exam;


         return view('admin.exam.show-questions')->with($data);
    }


 function store(Request $request)
{

    //  dd($request->all());

    $request->validate([

    'name_en'=>'required|string|max:50',
    'name_ar'=>'required|string|max:50',
    'desc_en'=>'required|string|max:5000',
    'desc_ar'=>'required|string|max:5000',
    'img'=>'required|image|max:2048',
    'skill_id'=>'required|exists:skills,id',
    'questions_no'=>'required|integer',
    'difficulty'=>'required|integer|min:1,max:5',
    'duration_mins'=>'required|integer|min:1'

   ]);
   $path=Storage::putFile("exams",$request->file('img'));

   $exam=Exam::create([
    'questions_no'=>$request->questions_no,
    'img'=>$path,
    'difficulty'=>$request->difficulty,
    'skill_id'=>$request->skill_id,
    'duration_mins'=>$request->duration_mins,
    'active'=>0,
    'name'=>json_encode([

    'en'=>$request->name_en,
    'ar'=>$request->name_ar,

    ]),
    'desc'=>json_encode([

        'en'=>$request->desc_en,
        'ar'=>$request->desc_ar,

    ])

   ]);


   $request->session()->flash('prev',"exam/{$exam->id}");
   return redirect(url("dashboard/exams/create-questions/{$exam->id}"));
}




function createQuestions(Exam $exam,Request $request)
{


    if(session("prev")!=="exam/{$exam->id}" and session("current")!=="exam/{$exam->id}")
    {
        return redirect(url("dashboard/exams"));

    }



    $data['exam_id']=$exam->id;
    $data['questions_no']=$exam->questions_no;
    $data['exam_is']=$exam->id;

return view('admin.exam.create-questions')->with($data);

}


function storeQuestions(Exam $exam,Request $request)
{

$request->session()->flash("current","exam/$exam->id");

    $request->validate([
        'titles'=>'required|array',
        'titles.*'=>'required|string|max:500',
        'right_anss'=>'required|array',
        'right_anss.*'=>'required|string|in:1,2,3,4',
        'option_1s'=>'required|array',
        'option_1s.*'=>'required|string|max:255',
        'option_2s'=>'required|array',
        'option_2s.*'=>'required|string|max:255',
        'option_3s'=>'required|array',
        'option_3s.*'=>'required|string|max:255',
        'option_4s'=>'required|array',
        'option_4s.*'=>'required|string|max:255',

  ]);


// dd($exam->id);
for($i=0;$i<$exam->questions_no;$i++)
{


  Question::create([

         'exam_id'=>$exam->id,
         'title'=>$request->titles[$i],
         'option_1'=>$request->option_1s[$i],
         'option_2'=>$request->option_2s[$i],
         'option_3'=>$request->option_3s[$i],
         'option_4'=>$request->option_4s[$i],
         'right_ans'=>$request->right_anss[$i]

  ]);

$exam->update([
    'active'=>1
]);

}

event(new ExamAddedEvent);
return redirect(url('dashboard/exams'));

}


function delete($id,Request $request)
{

  $exam=Exam::findOrFail($id);

  try{
       $exam->delete();

       $request->session()->flash('msg',"delete this row successfully");


  } catch(\Exception $e)

   {

    $request->session()->flash('errors',"can not delete this row");


    }

    return back();

}


function edit(Exam $exam)
{

    $data['skills']=Skill::select('id','name')->get();
      $data['exam']=$exam;
    return view('admin.exam.edit')->with($data);


}


function update(Request $request,Exam $exam)
{


  $request->validate([

    'name_en'=>'required|string|max:50',
    'name_ar'=>'required|string|max:50',
    'desc_en'=>'required|string|max:5000',
    'desc_ar'=>'required|string|max:5000',
    'img'=>'nullable|image|max:2048',
    'skill_id'=>'required|exists:skills,id',
    'difficulty'=>'required|integer|min:1|max:5',
    'durations_mins'=>'required|integer|min:1'

  ]);

 $path=$exam->img;
 if($request->hasFile('img'))
{

 Storage::delete($path);

 $path=Storage::putFile("exams",$request->file('img'));

}

$exam->update([

    'img'=>$path,
    'difficulty'=>$request->difficulty,
    'skill_id'=>$request->skill_id,
    'duration_mins'=>$request->duration_mins,
    'active'=>0,
    'name'=>json_encode([

    'en'=>$request->name_en,
    'ar'=>$request->name_ar,

    ]),

    'desc'=>json_encode([

        'en'=>$request->desc_en,
        'ar'=>$request->desc_ar,

    ])

]);


$request->session('msg',"row updated successfully");

return back();


}




function editQuestion(Exam $exam,Question $question)
{

$data['exam']=$exam;
$data['question']=$question;

// dd($data);

return view('admin.exam.edit-question')->with($data);

}




public function updateQuestion(Exam $exam,Question $question,Request $request)
{



 $data =$request->validate([
        'title'=>'required|string|max:500',
        'right_ans'=>'required|string|in:1,2,3,4',
        'option_1'=>'required|string|max:50',
        'option_2'=>'required|string|max:50',
        'option_3'=>'required|string|max:50',
        'option_4'=>'required|string|max:50',
       ]);

        $question->update($data);

        $request->session()->flash('msg','Question updated successfully');

        return redirect(url("dashboard/exams/show-questions/{$exam->id}/questions"));

}



public function deleteQuestion(Exam $exam,Question $question,Request $request)
{

    try{

        $question->delete();
        $request->session()->flash('msg'," delete this row successfully");

        return back();


    } catch(\Exception $e)

    {

     $request->session()->flash('msg',"can not delete this row");


     }

}


function toggle($id)
{


    // dd($id);

     $exam=Exam::findOrFail($id);

        $exam->update(['active'=>! $exam->active]);

            return back();


}


function create()
{

$data['skills']=Skill::select('id','name')->get();
return view('admin.exam.create')->with($data);

}





}
