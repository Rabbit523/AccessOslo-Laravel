<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Passengers extends Model
{
           /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'passengers';

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
        'user_id', 'gender', 'first_name', 'last_name', 'birth', 'nationality'
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
