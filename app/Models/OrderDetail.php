<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['user_id', 'product_id', 'order_id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }

    public function getProductIdAttribute()
    {
        return $this->product->id;
    }

    public function getOrderIdAttribute()
    {
        return $this->order->id;
    }

    public function getUserIdAttribute()
    {
        return $this->Auth::id();
    }
}
