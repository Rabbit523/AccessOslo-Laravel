<?php

namespace App\Models\Core;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender', 'first_name', 'last_name', 'country', 'city', 'email', 'phone', 'company', 'password','role_id', 'profile_complete', 'bonus'
    ];

    protected $table = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
}
