<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
class Product extends Model
{
    use HasFactory;
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function productSize()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }
    
}
