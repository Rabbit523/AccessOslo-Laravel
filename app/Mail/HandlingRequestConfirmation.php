<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandlingRequestConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $handling;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($handling)
    {
        $this->handling = $handling;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.handling-confirmation', compact('handling'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Handling Request - Booking Confirmation');
    }
}
