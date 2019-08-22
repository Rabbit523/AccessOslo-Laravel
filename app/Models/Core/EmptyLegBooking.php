<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class EmptyLegBooking extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'booking_emptyleg';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['partner_name', 'flight_no', 'end_date', 'end_time', 'aircraft', 'seats', 'departure', 'destination', 'day', 'month', 'year', 'price', 'currency'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
