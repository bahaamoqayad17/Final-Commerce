<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function file()
    {
        return $this->morphMany(File::class, 'attachable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
}
