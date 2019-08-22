<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class BookingMeet extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'booking_meet';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['contact_person', 'phone', 'email', 'company', 'travelers', 'in_flight_number', 'in_airline', 'in_date', 'in_time', 'in_luggage', 'in_booking_reference', 'in_meet_service', 'in_departure_time', 'in_connect_flight_number', 'out_flight_number', 'out_airline', 'out_date', 'out_time', 'out_luggage', 'out_booking_reference', 'out_meet_service', 'out_departure_time', 'out_connect_flight_number', 'comments', 'total_cost', 'payment_id', 'is_departure', 'is_arrival', 'is_added'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
