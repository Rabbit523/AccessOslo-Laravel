<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $name)
    {   
        $this->token = $token;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.reset-password', compact('token', 'name'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Reset your password');
    }
}
