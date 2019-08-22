<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class BookingTravels extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'booking_travels';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['gender', 'first_name', 'last_name', 'phone', 'email', 'comments', 'travel_type', 'status', 'total_cost', 'partner_name', 'aircraft', 'payment_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
