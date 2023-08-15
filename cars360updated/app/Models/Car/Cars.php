<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Car\Brands;

class Cars extends Model
{
    public static $STATUSES = [
                    1 => 'Active',
                    2 => 'Sold',
                    3 => 'Inactive'
                ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function brand() {
        return $this->hasOne('App\Models\Car\Brands', 'id', 'brands_id');
    }

    public function images() {
        return $this->hasOne('App\Models\Car\CarImages', 'cars_id', 'id');
    }
}
