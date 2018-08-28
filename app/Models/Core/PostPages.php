<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class PostPages extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'posts';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['post_title', 'post_description', 'author', 'published_date', 'status', 'meta_title', 'meta_description', 'post_img', 'single_img'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
