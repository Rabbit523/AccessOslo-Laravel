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

    protected $fillable = ['en_page_title', 'page_title_plain', 'en_page_content', 'author', 'published_date', 'status', 'en_meta_title', 'en_meta_description', 'banner_img', 'nb_page_title', 'nb_page_content', 'nb_meta_title', 'nb_meta_description'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
