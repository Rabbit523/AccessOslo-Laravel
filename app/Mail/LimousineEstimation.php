<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LimousineEstimation extends Mailable
{
    use Queueable, SerializesModels;
    public $limousine;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($limousine)
    {
        $this->limousine = $limousine;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.limousine-booking-estimation', compact('limousine'))
        ->from("contact@accessoslo.no", "AccessOslo")
        ->subject('Limousine Transport- Booking Estimation');
    }
}
