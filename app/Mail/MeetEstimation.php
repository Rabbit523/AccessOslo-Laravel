<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MeetEstimation extends Mailable
{
    use Queueable, SerializesModels;
    public $meet;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($meet)
    {
        $this->meet = $meet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.meet-estimation', compact('meet'))
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Meet & Greet- Booking Estimation');
    }
}
