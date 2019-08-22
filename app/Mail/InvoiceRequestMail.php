<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Core\Passengers;
use App\Models\Core\BookingCharters;
use App\Models\Core\BookingMeet;
use App\Models\Core\BookingLimousine;

class InvoiceRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $charter, $email, $user_email;
    public $passengers = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request_data)
    {
        $this->user_email = $request_data['user_email'];
        $this->email = $request_data['email'];
        if ($request_data['type'] == "executive") {
            $this->charter = BookingCharters::where('id', $request_data['charter_id'])->first();
        } else if ($request_data['type'] == "emptyleg"){
            $this->charter = Emptyleg::where('id', $request_data['charter_id'])->first();
        } else if ($request_data['type'] == "limousine"){
            $this->charter = BookingLimousine::where('id', $request_data['charter_id'])->first();
        } else if ($request_data['type'] == "meet"){
            $this->charter = BookingMeet::where('id', $request_data['charter_id'])->first();
        }
        $_passengers = Passengers::get();
        $selected_passengers = $request_data['passengers'];
        foreach ($_passengers as $passenger) {
            foreach ($selected_passengers as $sel) {
                if ($passenger->id == $sel['id']) {
                    array_push($this->passengers, $sel);
                }
            }
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice-request', compact('email', 'charter', 'passengers'))
        ->from($this->user_email, $this->charter->contact_person)
        ->subject('Wire Transfer Request');
    }
}
