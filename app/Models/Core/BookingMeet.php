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

    protected $fillable = ['contact_person', 'phone', 'email', 'company', 'flight_number', 'airline', 'date', 'time', 'luggage', 'travelers', 'booking_reference', 'meet_service','product', 'departure_time', 'connect_flight_number', 'comments', 'total_cost', 'partner_name', 'aircraft'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
