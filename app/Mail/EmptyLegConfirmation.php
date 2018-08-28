<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmptyLegConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $emptyleg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emptyleg)
    {
        $this->emptyleg = $emptyleg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.emptyleg-confirmation', compact('emptyleg'))
        ->from("contact@accessoslo.no", "AccessOslo")
        ->subject('EmptyLeg - Booking Confirmation');
    }
}
