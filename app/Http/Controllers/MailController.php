<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FIALMail; 
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    // public function sendFIALMail(){
    //     $sender_info = ['message' => 'This is a test!'];
    
    // Mail::to('georgesmpopovic@gmail.com')->send(new FIALMail($sender_info));


    // }

        public function sendFIALMail(Request $request){

            // print_r($request->input());

            $name = $request->input('template-contactform-name');
            $email = $request->input('template-contactform-email');
            $phone = $request->input('template-contactform-phone');
            $subject = $request->input('subject');
            $message = $request->input('template-contactform-message');




            // Array ( 
                // [_token] => xyz 
                // [template-contactform-name] => george 
                // [template-contactform-email] => g@gmail.com 
                // [template-contactform-phone] => 
                // [subject] => hhh 
                // [template-contactform-message] => hhhhh 
                // [template-contactform-botcheck] => 
                // [template-contactform-submit] => submit 
                // [prefix] => template-contactform- )
            

        $sender_info = ['name'=>$name, 'email'=>$email, 
                        'phone'=>$phone, 
                        'subject'=>$subject, 
                        'message'=>$message];
    
    Mail::to('georgesmpopovic@gmail.com')->send(new FIALMail($sender_info));


    }

}
