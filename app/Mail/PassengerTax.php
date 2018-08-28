<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassengerTax extends Mailable
{
    use Queueable, SerializesModels;

    public $passenger;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($passenger)
    {
        $this->passenger = $passenger;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.passenger-tax-confirmation', compact('passenger'))
        ->from($this->passenger->email, $this->passenger->contact_person)
        ->subject('Air Passenger Tax Confirmation');
    }
}
