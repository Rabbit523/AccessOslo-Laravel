<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingCargoEstimation extends Mailable
{
    use Queueable, SerializesModels;
    public $cargo_charter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cargo_charter)
    {
        $this->cargo_charter = $cargo_charter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.booking-cargo-estimation', compact('cargo_charter'))
        ->from("contact@accessoslo.no", "AccessOslo")
        ->subject('Cargo Chater- Booking Estimation');
    }
}
