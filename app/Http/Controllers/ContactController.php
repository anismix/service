<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\ContactMail;
use App\Service;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Validator;
class ContactController extends Controller
{
    //
    public function contact(Request $request){
        if($request->isMethod('post')){
        $data =$request->all();
        $validator = Validator::make($data,[

            'name'=>'required|min:3|max:25',
            'email'=>'required|email',
            'subject'=>'required|min:3',
            'message'=>'required|min:3'
           ]);
           if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $message=[
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message'=>$data['message']

        ];
        Mail::send('emails.contact', $message, function ($message){
            $message->to('eservicemanarate@gmail.com')->subject('Contact Email - E-Service');
    //    Mail::to('eservicemanarate@gmail.com')->send(new ContactMail($info));
    });}
    return view('user.contact');
    }
}


