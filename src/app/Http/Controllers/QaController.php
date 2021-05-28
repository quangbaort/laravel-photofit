<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qa;
use App\Models\QaGroup;
class QaController extends Controller
{
    //
    public function getQa()
    {

        $qa = QaGroup::with('Qa')->get();
        // dd($qa);
        return response()->json($qa);
    }
}
