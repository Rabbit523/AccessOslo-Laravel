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

    protected $fillable = ['post_title_plain', 'en_post_title', 'en_post_description', 'author', 'published_date', 'status', 'en_meta_title', 'en_meta_description', 'post_img', 'single_img', 'nb_post_title', 'nb_post_description', 'nb_meta_title', 'nb_meta_description'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
