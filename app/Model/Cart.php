<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\Model\User;

class Cart extends Model
{
    protected $fillable = [
        'created_by',
        'products_id',
        'qnt',
        'price',
    ];
    public  function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
