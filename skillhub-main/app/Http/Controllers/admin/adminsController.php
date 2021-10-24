<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class adminsController extends Controller
{

function index()
{

    $superAdminRole=Role::where('name','superadmin')->first();
    $adminsRole=Role::where('name','admin')->first();

    $data['admins']=User::whereIn('role_id',[$adminsRole->id,$superAdminRole->id])
    ->ORDERbY('id','desc')
    ->paginate(10);



         return view('admin.admins.index')->with($data);
}



function create()
{

   $data['roles']=Role::select('id','name')->whereIn('name',['admin','superadmin'])->get();
   return view('admin.admins.create')->with($data);



}


function store(Request $request)
{

   $data=$request->validate([
   'name'=>'required|string|max:50',
   'email'=>'required|email',
   'password'=>'required|confirmed',
   'role_id'=>'required|exists:roles,id'
    ]);

  $user  =User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'role_id'=>$request->role_id,
        'password'=>Hash::make($request->password),


    ]);

    // event(new Registered($user));
  $request->session()->flash('msg','successfully proccess');

  return redirect(url('dashboard/admins/'));

}



function prompt(User $user)
{


$roleId=Role::select('id')->Where('name','superadmin')->first();

$user->update([
    'role_id'=>$roleId->id
]);

return back();
}



function deompt(User $user)
{


$roleId=Role::select('id')->Where('name','admin')->first();

$user->update([
    'role_id'=>$roleId->id
]);

return back();
}


function delete(User $user)
{



    try{

        $user->delete();
        return back();



    }catch(\Exception $e)
    {

    return back();

    }

}

}

