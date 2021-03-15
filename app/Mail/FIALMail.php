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

    private $sender_info = []; 


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_info)
    {
        //

        $this->sender_info = $sender_info; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $name = $this->sender_info['name'];
        $subject = $this->sender_info['subject'];
        // $message = $this->sender_info['message']; 
        // $email = $this->sender_info['email']; 


        $address = 'gsmpopovicdev@gmail.com';
        
                return $this->view('emails.template')
                    ->from($address, $name)
                    // ->cc($address, $name)
                    // ->bcc($address, $name)
                    // ->replyTo($address, $name)
                    ->subject($subject)
                    ->with('sender_info', $this->sender_info
                );

        // return $this->view('emails.test')
        //             ->from($address, $name)
        //             // ->cc($address, $name)
        //             // ->bcc($address, $name)
        //             // ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->with([ 'test_message' => 'hi' ]);
    }
}
