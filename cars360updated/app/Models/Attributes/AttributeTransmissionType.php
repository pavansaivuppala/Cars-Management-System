<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Model;

class AttributeTransmissionType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_transmission_type';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
