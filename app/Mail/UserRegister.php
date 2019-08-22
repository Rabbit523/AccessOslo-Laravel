<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $name;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $first_name, $email)
    {   
        $this->password = $password;
        $this->name = $first_name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.user-register', compact('password', 'name', 'email'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Welcome to Access Oslo');
    }
}
