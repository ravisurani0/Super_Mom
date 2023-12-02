<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


use App\Model\Product;

class productAdditionalInfo extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'details',
        'sortOrder',
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
