<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'profile';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['user_id', 'gender', 'first_name', 'last_name', 'email', 'date_birth', 'company', 'home_phone', 'addInfo_address1', 'addInfo_address2', 'addInfo_city', 'addInfo_region', 'addInfo_code', 'addInfo_country', 'billInfo_address1', 'billInfo_address2', 'billInfo_city', 'billInfo_region', 'billInfo_code', 'billInfo_country', 'billInfo_company', 'sms_notification'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
