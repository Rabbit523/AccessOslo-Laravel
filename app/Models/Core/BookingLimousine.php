<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class BookingLimousine extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'booking_limousine';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['contact_person', 'phone', 'email', 'company', 'date', 'type_car', 'luggage', 'travelers', 'type_flight', 'from_address', 'to_address','comments', 'status', 'total_cost', 'payment_id', 'return_from_address', 'return_to_address', 'return_date', 'return_time', 'is_added'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
