<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Cat;
use Illuminate\Support\Facades\Storage;

use BaconQrCode\Renderer\Path\Path;

class adminSkillController extends Controller
{


    function index()
    {


        $data['skills']= Skill::orderBy('id','desc')->paginate(8);
        $data['cats']= Cat::get();

         return view('admin.skill.index')->with($data);

    }



 function store(Request $request)
{

    $request->validate([

    'name_en'=>'required|string|max:50',
    'name_ar'=>'required|string|max:50',
    'img'=>'required|image|max:2048',
    'cat_id'=>'required|exists:cats,id'
   ]);

   $path=Storage::putFile("skills",$request->file('img'));


   Skill::create([
    'cat_id'=>$request->cat_id,
    'img'=>$path,
    'name'=>json_encode([
        'en'=>$request->name_en,
        'ar'=>$request->name_ar,
                 ]),


   ]);



   $request->session()->flash("success","row add successfully");
   return back();
}

function delete($id,Request $request)
{

  $skill=Skill::findOrFail($id);

  try{
       $skill->delete();

       $request->session()->flash('success',"delete this row successfully");


  } catch(\Exception $e)

   {

    $request->session()->flash('msg',"can not delete this row");

    }
    return back();

}



function update(Request $request)
{

    $request->validate([
        'id'=>'required|exists:skills,id',
        'name_en'=>'required|string|max:50',
        'name_ar'=>'required|string|max:50',
        'img'=>'nullable|image|max:2048',
        'cat_id'=>'required|exists:cats,id'
       ]);


       $skill=Skill::findOrFail($request->id);


       $path=$skill->img;


       if($request->hasFile('img'))
       {

        Storage::delete($path);

        $path=Storage::putFile("skills",$request->file('img'));

       }

       $skill->update([
        'cat_id'=>$request->cat_id,
        'img'=>$path,
        'name'=>json_encode([
        'en'=>$request->name_en,
        'ar'=>$request->name_ar,
               ]),


       ]);


 $request->session()->flash('success'," this row updates successfully");

return back();
    }





function toggle($id)
{


    // dd($id);

     $skill=Skill::findOrFail($id);

        $skill->update(['active'=>! $skill->active]);

            return back();


}





}
