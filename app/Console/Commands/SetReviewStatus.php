<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Core\BookingCharters;
use App\Models\Core\BookingLimousine;
use App\Models\Core\BookingMeet;
use App\Models\Core\HandlingRequest;
use App\Models\Core\EmptyLegUserBooking;
use App\Models\Core\EmptyLegBooking;

class SetReviewStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:setreviewstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $nextday = strtotime(date('Y-m-d', strtotime(' +1 day')));
        $charters = BookingCharters::where('booking_type', 'executive')->where('status', 'paid')->get();
        foreach ($charters as $charter) {
            if ($charter->flight_type == "One Way") {
                if (strtotime($charter->date) == $nextday) {
                    $charter->is_review = "true";
                    $charter->save();
                }
            } else {
                if (strtotime($charter->return_date) == $nextday) {
                    $charter->is_review = "true";
                    $charter->save();
                }
            }
        }
        $meets = BookingMeet::where('status', 'paid')->get();
        foreach ($meets as $meet) {
            if (strtotime($meet->in_date) == $nextday) {
                $meet->is_review = "true";
                $meet->save();
            }
        }
        $limousines = BookingLimousine::where('status', 'paid')->get();
        foreach ($limousines as $limousine) {
            if ($limousine->type_flight == "One Way") {
                if (strtotime($limousine->date) == $nextday) {
                    $limousine->is_review = "true";
                    $limousine->save(); 
                }  
            } else {
                if (strtotime($limousine->return_date) == $nextday) {
                    $limousine->is_review = "true";
                    $limousine->save();
                }
            }
        }
        $emptys = EmptylegUserBooking::where('status', 'paid')->get();
        foreach($emptys as $empty) {
            if (strtotime($empty->end_date) == $nextday) {
                $empty->is_review = "true";
                $empty->save();
            }
        }
    }
}
