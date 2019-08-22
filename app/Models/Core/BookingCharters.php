<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class BookingCharters extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'booking_charters';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['booking_type', 'departure', 'destination', 'contact_person', 'date', 'time', 'return_date', 'return_time', 'flight_type', 'travellers', 'status', 'phone', 'email', 'company', 'bonus', 'payment_id', 'total_estimations', 'is_review', 'additional_service'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
