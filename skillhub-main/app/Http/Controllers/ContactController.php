<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Setting;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ContactController extends Controller
{


  function index()
{


  $data['sett']=Setting::first();

    return view('web.contact.index')->with($data) ;
}


function send(Request $request)
{

$request->validate([

'name'=>'required|string|max:255',
'email'=>'required|email|max:255',
'subject'=>'nullable|string|max:255',
 'body'=>'required|string'
]);


Message::create([
'name'=>$request->name,
'email'=>$request->email,
'subject'=>$request->subject,
'body'=>$request->body


]);

$data=['success'=>'your message send successfully'];

return Response::json($data);
}


}
