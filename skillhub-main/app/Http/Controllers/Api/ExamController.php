<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{




    function show($id)
    {

          $exam=Exam::findOrFail($id);
          return new ExamResource($exam);


    }


    function showQuestions($id)
    {

          $exam=Exam::with('questions')->findOrFail($id);
          return new ExamResource($exam);


    }
    function start(Request $request,$examId)
    {

       $request->user()->exams()->attach($examId);
       return response()->json(["you start exam"]);

    }



function submit($examId,Request $request)
{


    $validator=Validator::make($request->all,[

   'answers'=>'required|array',
   'answer.*'=>'required|in:1,2,3,4'

    ]);


if($validator->fails())
{

    return response()->json($validator->errors());
}

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

return response()->json($score);

$submitTime=Carbon::now();
// replace Auth with $reuest
$user=$request->user();

  $pivoteRow=$user->exams()->where('exam_id',$examId)->first();

  $startTime=$pivoteRow->pivot->created_at;


  $timeMins=$submitTime->diffInMinutes($startTime);


  if($timeMins>$pivoteRow->duration_mins)
{

   $score=0;

// }

// //   update pivote row


$user->exams()->updateExistingPivot($examId,[

'score'=>$score,
'time_mins'=>$timeMins
]);

// set messagein the session


return response()->json([
    "message"=>"you submitted exam successfully your score is $score"
]);

}




}


}






}
