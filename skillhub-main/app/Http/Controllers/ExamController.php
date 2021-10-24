<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

public function show($id)
{

           $data['exam']=Exam::findOrFail($id);

           $data['canViewStartBtn']=true;
           $user=Auth::user();

           if($user!=NULL)
           {

            $pivoteRow=$user->exams()->where('exam_id',$id)->first();


            if($pivoteRow!==NULL and $pivoteRow->pivot->status=='closed')
           {

              $data['canViewStartBtn']=false;

          }


           }




           return view('web.exams.show')->with($data);



}



function start($examId,Request $request)
{
// dd(";");
    $user=Auth::user();

     if(! $user->exams->contains($examId))
     {
        $user->exams()->attach($examId);

     }else{
 $user->exams()->updateExistingPivot($examId,[

    'status'=>'closed'
 ]);

     }

         $request->session()->flash("prev","start/$examId");
         return redirect( url("exams/questions/$examId") );

}



public function questions($examId,Request $request)
{

   if(session("prev")!=="start/$examId")
   {

       return redirect(url("exam/show/$examId"));

   }

   $request->session()->flash("prev","questions/$examId");

    $data['exam']=Exam::findOrFail($examId);
    return view('web.exams.questions')->with($data);

}






function submit($examId,Request $request)
{
    if(session("prev")!=="questions/$examId")
    {

        return redirect(url("exam/show/$examId"));

    }

$request->validate([

    // 'answers'=>'required|array',
    // 'answers.*'=>'required|in:1,2,3,4',

]);

$points=0;
$exam=Exam::findOrFail($examId);
$totalQuesNum=$exam->questions->count();
foreach($exam->questions as $question)
{
if (isset($request->answers[$question->id]))
{
    $userAns=$request->answers[$question->id];
    $rightAns=$question->right_ans;

    if($userAns==$rightAns)
{
    $points+=1;

}

}

$score=($points/$totalQuesNum)*100;

}

$submitTime=Carbon::now();
$user=Auth::user();

  $pivoteRow=$user->exams()->where('exam_id',$examId)->first();

  $startTime=$pivoteRow->pivot->created_at;


  $timeMins=$submitTime->diffInMinutes($startTime);


  if($timeMins>$pivoteRow->duration_mins)
{

   $score=0;

}



//   update pivote row


$user->exams()->updateExistingPivot($examId,[

'score'=>$score,
'time_mins'=>$timeMins
]);

// set messagein the session

$request->session()->flash("success','you finish the exam successfully with $score");

return redirect(url("exam/show/$examId"));
}
}











