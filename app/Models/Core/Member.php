<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'member';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['name', 'position', 'email', 'description', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
