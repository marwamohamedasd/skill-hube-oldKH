<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\contactResponseMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

function index()
{

    $data['messages']=Message::ORDERBY('id','desc')->paginate(10);

    return view('admin.messages.index')->with($data);
}

public function show(Message $message)
{

    $data['message']=$message;

    return view('admin.messages.show')->with($data);
}


public function response(Message $message,Request $request)
{

   $request->validate([
       'title'=>'required|string|max:255',
       'body'=>'required|string',
   ]);

   $receiverName=$message->name;
   $receiverMail=$message->email;

   Mail::to($receiverMail)->send(new contactResponseMail($receiverName,$request->title,$request->body));


$request->session()->flash('msg',"message sended successfully");
   return redirect(url("dashboard/messages"));
}




}
