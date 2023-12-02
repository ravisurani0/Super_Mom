<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $fillable = [
        'product_id',
        'category_id',
    ];
    
}

