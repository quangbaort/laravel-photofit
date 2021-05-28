<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
class GuideController extends Controller
{
    //
    public function getGuide()
    {
        $guide = Guide::all();
        return response()->json($guide);
    }
}
