<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class AircraftCars extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aircrafts_cars';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['partner_name', 'type', 'capacity', 'img'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
