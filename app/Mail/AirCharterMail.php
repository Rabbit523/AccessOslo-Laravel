<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AirCharterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $charter;
    public $type;
    public $gender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($charter, $gender)
    {
        $this->charter = $charter;
        $this->type = $charter->booking_type;
        $this->gender = $gender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        if ($this->type == "executive") {
            return $this->view('email.alert-aircharter-request', compact('charter', 'gender'))
            ->from("contact@accessoslo.no", "Access Oslo")
            ->subject('New Request for Executive Charter');
        } else if ($this->type == "group") {
            return $this->view('email.alert-aircharter-request', compact('charter', 'gender'))
            ->from("contact@accessoslo.no", "Access Oslo")
            ->subject('New Request for Group Charter');
        } else if ($this->type == "helicopter") {
            return $this->view('email.alert-aircharter-request', compact('charter', 'gender'))
            ->from("contact@accessoslo.no", "Access Oslo")
            ->subject('New Request for Helicopter Charter');
        }        
    }
}
