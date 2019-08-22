<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public $text, $question;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text, $question)
    {
        $this->text = $text;
        $this->question = $question;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('email.feedback-request', compact('text', 'question'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Feedback for Additional Service of Executive Charter');
    }
}
