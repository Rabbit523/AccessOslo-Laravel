<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class AirpassengerTax extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'airpassenger_tax';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['contact_person', 'phone', 'email', 'company', 'country', 'approx_no'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
