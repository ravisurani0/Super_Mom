<?php

namespace App\Model;

use App\Model\productProductAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

use App\Model\productImageGallery;
use App\Model\Cart;
use App\Model\Category;
use App\Model\ProductCategories;

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
        'sort_order',
        'is_best_seller',
        'is_new_product',
        'selling_price',
        'tags',
        'long_description',
        'slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'status',
    ];


    public function imageGallery()
    {
        return $this->hasMany(productImageGallery::class, 'product_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(Cart::class, 'id', 'products_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, ProductCategories::class, 'product_id', 'category_id');
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategories::class, 'product_id', 'id');
    }
}
