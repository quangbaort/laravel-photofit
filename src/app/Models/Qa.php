<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QaGroup;
class Qa extends Model
{
    use HasFactory;
    public function QaGroup()
    {
        return $this->belongsTo(QaGroup::class);
    }
}
