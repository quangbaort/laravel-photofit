<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Qa;
class QaGroup extends Model
{
    use HasFactory;
    public function Qa()
    {
        return $this->hasMany(Qa::class);
    }
}
