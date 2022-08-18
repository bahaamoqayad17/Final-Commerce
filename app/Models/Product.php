<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['category_name'];

    use HasFactory;

    protected $guarded = [];

    public function file()
    {
        return $this->morphMany(File::class, 'attachable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }
}
