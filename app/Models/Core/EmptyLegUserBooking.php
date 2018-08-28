<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class EmptyLegUserBooking extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_emptyleg';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['flight_no', 'gender', 'contact_person', 'phone', 'email', 'company', 'status', 'is_added', 'departure', 'destination', 'end_date', 'end_time', 'partner_name', 'aircraft', 'price', 'currency', 'member_notice'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
