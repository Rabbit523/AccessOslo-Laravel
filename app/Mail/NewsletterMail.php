<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->newsletter = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('email.newsletter', compact('newsletter'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Newsletter');
    }
}
