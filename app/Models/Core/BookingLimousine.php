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

    protected $fillable = ['contact_person', 'phone', 'email', 'company', 'date', 'type_car', 'type_flight', 'from_address', 'to_address','comments', 'status', 'zone', 'total_cost'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
