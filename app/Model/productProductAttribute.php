<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class productProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'product_attribute_id',
    ];
    protected $hidden = [
        'id',
        'product_id',
        'created_at',
        'updated_at',
    ];
}
