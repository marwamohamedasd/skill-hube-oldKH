<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;

class adminCatController extends Controller
{
    
    function index()
    {


        $data['cats']= Cat::orderBy('id','desc')->paginate(8);

         return view('admin.cat.index')->with($data);

    }



 function store(Request $request)
{

    $request->validate([

    'name_en'=>'required|string|max:50',
    'name_ar'=>'required|string|max:50',
   ]);

   Cat::create([
    'name'=>json_encode([

        'en'=>$request->name_en,
        'ar'=>$request->name_ar, 

    ])
    
   ]);


   $request->session()->flash("msg","row add successfully");
   return back();
}

function delete($id,Request $request)
{

  $cat=Cat::findOrFail($id);

  try{
       $cat->delete();
       
       $request->session()->flash('msg',"delete this row successfully");


  } catch(\Exception $e)
    
   {

    $request->session()->flash('errors',"can not delete this row");


    }




    return back();

}
 


function update(Request $request)
{


    $request->validate([
        'id'=>'required|exists:cats,id',
        'name_en'=>'required|string|max:50',
        'name_ar'=>'required|string|max:50',
       ]);
    

           $cat=Cat::findOrFail($request->id);


        $cat->update([
              'name'=>json_encode([
              'en'=>$request->name_en,
              'ar'=>$request->name_ar
          ]),

          ]);
         $request->session()->flash("msg","row update successfully");

 return back();

}





function toggle($id)
{


    // dd($id);

     $cat=Cat::findOrFail($id);

        $cat->update(['active'=>! $cat->active]);

            return back();


}






}


