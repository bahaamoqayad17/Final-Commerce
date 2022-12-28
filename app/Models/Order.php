<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['user_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getUserIdAttribute()
    {
        return $this->Auth::id();
    }
}
