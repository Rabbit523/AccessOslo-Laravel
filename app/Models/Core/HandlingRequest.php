<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class HandlingRequest extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'handling_request';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['airport', 'company', 'aircraft', 'crew_config1', 'crew_config2', 'flight_type', 'hotac', 'catering', 'person','phone','fax', 'email', 'inbound_flight', 'inbound_date', 'inbound_orig', 'inbound_captain', 'inbound_utc', 'inbound_pax', 'outbound_flight','outbound_date','outbound_orig','outbound_captain','outbound_utc','outbound_pax','comments'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
