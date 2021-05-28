<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoSpotImage extends Model
{
    protected $fillable = [
        'photo_id',
        'height',
        'width',
        'data'
    ];
}
