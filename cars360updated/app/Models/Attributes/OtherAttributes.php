<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Model;

class OtherAttributes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'other_attributes';

    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
