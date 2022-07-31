<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function file()
    {
        return $this->morphMany(File::class, 'attachable');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}