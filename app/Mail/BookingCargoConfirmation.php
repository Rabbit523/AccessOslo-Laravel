<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingCargoConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $cargo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.booking-cargo-confirmation', compact('cargo'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Cargo Charger - Booking Confirmation');
    }
}
