<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(product::class, 'products_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'id');
    }
}
