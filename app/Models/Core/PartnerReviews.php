<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class PartnerReviews extends Model
{
          /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'partner_rate';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['partner_id', 'partner_name', 'total_rate', 'highlight', 'atmosphere', 'testimonial', 'customer_name', 'data_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
