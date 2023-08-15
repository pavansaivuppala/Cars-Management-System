<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class SeoInformation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seo_information';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
