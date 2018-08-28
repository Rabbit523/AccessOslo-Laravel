<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class SecurityQuestions extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'security_questions';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['user_id', 'question1', 'pwd_que1', 'question2', 'pwd_que2'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
