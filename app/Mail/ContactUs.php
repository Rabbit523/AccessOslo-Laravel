<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUS extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $_message;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $last_name, $email, $phone, $message, $type)
    {           
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->_message = $message;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->type == "*.*") {
            return $this->view('email.contact-us', compact('first_name', 'last_name', 'email', 'phone', '_message', 'type'))
            ->from("contact@accessoslo.no", "Access Oslo")
            ->subject("New contact request");
        } else {
            return $this->view('email.contact-us', compact('first_name', 'last_name', 'email', 'phone', '_message', 'type'))
            ->from("contact@accessoslo.no", "Access Oslo")
            ->subject("New contact request for ".$this->type);
        }        
    }
}
