<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\Order;
use App\Model\Product;


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
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function product()
    {
        return  $this->belongsTo(Product::class, 'products_id', 'id')->withTrashed();
    }
    public function OrderItemCount()
    {
        return $this->hasMany(Product::class, 'products_id', 'id')->count();
    }
}
