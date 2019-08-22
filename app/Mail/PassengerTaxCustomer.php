<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassengerTaxCustomer extends Mailable
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
        ->from("contact@accessoslo.no", "Access Oslo")
        ->subject('Air Passenger Tax Confirmation');
    }
}
