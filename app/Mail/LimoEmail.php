<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LimoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $charter;    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($charter)
    {
        $this->charter = $charter;        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {          
        return $this->view('email.alert-limo-request', compact('charter'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('New Request for Airport Limo');              
    }
}
