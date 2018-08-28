<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class PageSettings extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pages';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['page_title', 'page_title_plain', 'page_content', 'extra_content', 'author', 'published_date', 'status', 'meta_title', 'meta_description', 'banner_img'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
