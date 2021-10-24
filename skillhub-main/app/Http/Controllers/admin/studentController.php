<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class studentController extends Controller
{

function index()
{

    $studentRole=Role::where('name','student')->first();

    $data['students']=User::where('role_id',$studentRole->id)->ORDERbY('id','desc')->paginate(10);

   return view('admin.students.index')->with($data);

}


   function showScroes($id)
   {

      $student=User::findOrFail($id);


    //   dd($student);
    //   if($student->role->name!='student')
    //  {

    //   return back();

    //  }else{


      $data['student']=$student;


    // }


    return view('admin.students.showScores')->with($data);

   }


   function openExam($studentId,$examId)
   {

  $student=User::findOrFail($studentId);

//   DD($student);

$student->exams()->updateExistingPivot($examId,[

    'status'=>'opened'


]);

return back();



   }


   function closeExam($studentId,$examId)
   {

  $student=User::findOrFail($studentId);

//   DD($student);
// many to many relationship

$student->exams()->updateExistingPivot($examId,[

    'status'=>'closed'


]);

return back();



   }




}
