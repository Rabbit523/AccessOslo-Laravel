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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $first_name, $last_name)
    {   
        $this->password = $password;
        $this->name = $first_name." ".$last_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.user-register', compact('password', 'name'))
        ->from("smtp@fantasylab.no", "AccessOslo")
        ->subject('Welcome to Access Oslo');
    }
}
