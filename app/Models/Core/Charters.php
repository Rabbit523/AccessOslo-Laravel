<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Charters extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'charters';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['author', 'contact_person', 'email', 'aircraft', 'estimate_cost', 'additional_fee', 'total_cost', 'charter_type', 'charter_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
