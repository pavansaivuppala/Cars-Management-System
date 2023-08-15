<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class CarImages extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_images';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
