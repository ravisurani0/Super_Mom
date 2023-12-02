<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\Model\ProductCategories;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'tags',
        'slug',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, ProductCategories::class);
    }

    public function getImageAttribute($value)
    {

        return env('APP_URL') . 'storage/images/categorys/' . $value;
    }

    public function  getProductImage()
    {
        if (count($this->product) && $this->product[0]->imageGallery && count($this->product[0]->imageGallery)) {
            return $this->product[0]->imageGallery[0]->image;
        } else {
            return null;
        }
    }


    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
