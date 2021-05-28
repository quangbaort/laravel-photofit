<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBackground extends Model
{
    use HasFactory;
    public function backgroundReview()
    {
        return $this->hasMany(BackgroundReview::class);
    }
}
