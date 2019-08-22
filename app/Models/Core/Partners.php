<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
           /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'partners';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'partner_name', 'contact_person', 'phone', 'email', 'last_audit', 'permission', 'coverage', 'average_flight', 'operate_since', 'valid', 'description', 'type', 'main_img', 'sub_img', 'additional_fee', 'norway_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
}
