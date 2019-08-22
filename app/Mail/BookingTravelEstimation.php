<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingTravelEstimation extends Mailable
{
    use Queueable, SerializesModels;
    public $destination;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($destination)
    {
        $this->destination = $destination;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.booking-travel-estimation', compact('destination'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Aircraft Chaters- Booking Estimation');
    }
}
