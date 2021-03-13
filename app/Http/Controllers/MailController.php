<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FIALMail; 
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendFIALMail(){
        $data = ['message' => 'This is a test!'];
    
    Mail::to('georgesmpopovic@gmail.com')->send(new FIALMail($data));


    }
}
