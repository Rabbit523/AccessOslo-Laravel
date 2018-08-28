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
        'user_id', 'phone', 'email', 'post_box', 'site_url', 'partner_name', 'contact_person', 'last_audit', 'permission', 'coverage', 'average_flight', 'operate_since', 'valid'
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
