<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingEstimation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking_charter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking_charter)
    {
        $this->booking_charter = $booking_charter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.booking-estimation', compact('booking_charter'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Aircraft Charter - Booking Estimation');
    }
}
