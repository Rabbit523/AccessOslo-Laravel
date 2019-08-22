<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name)
    {           
        $this->name = $first_name;        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.welcome-user', compact('name'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Welcome to Access Oslo');
    }
}
