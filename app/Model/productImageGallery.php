<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class productImageGallery extends Model
{
    protected $fillable = [
        'product_id',
        'image',
    ];

    protected $hidden = [
        'id',
        'product_id',
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getImageAttribute($value)
    {
        return env('APP_URL') . 'storage/images/product_gallary/' . $value;
    }
}
