<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItems extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'products_id',
        'qnt',
        'tax_rate',
        'tax_amount',
        'price',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function product()
    {
        return  $this->belongsTo(Product::class, 'products_id', 'id');
    }
    public function OrderItemCount()
    {
        return $this->hasMany(Product::class, 'products_id', 'id')->count();
    }
}
