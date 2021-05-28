<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundReview extends Model
{
    use HasFactory;
    public function productBackground(){
        return $this->belongsTo(ProductBackground::class);
    }
}
