<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'short_name',
        'description',
        'image',
        'price',
        'gst_rate',
        'hsn_code',
        'carton_capacity',
        'status',
    ];

    public function User()
    {
        $this->belongsTo(Cart::class, 'id', 'products_id');
    }
}
