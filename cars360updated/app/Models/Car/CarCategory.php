<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_category';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the cars for the category.
     */
    public function cars()
    {
        return $this->hasMany(Cars::class, 'car_category_id', 'id');
    }
}
