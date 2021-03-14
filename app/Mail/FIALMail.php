<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request; 
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FIALMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = []; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //

        $this->data = $data; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $name = $this->data['from'];
        $subject = $this->data['subject'];


        $address = 'gsmpopovicdev@gmail.com';
        // // $subject = 'This is a demo!';
        // $name = 'Jane Doe';

        // return $this->view('emails.test')
        //             ->from($address, $name)
        //             // ->cc($address, $name)
        //             // ->bcc($address, $name)
        //             // ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->with([ 'test_message' => 'hi' ]);
    }
}
