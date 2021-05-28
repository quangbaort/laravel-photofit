<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function getNews()
    {
        $news = News::all();
        $newsLimit = News::orderBy('updated_at' , 'DESC')->paginate(3);
        return response()->json(['news' => $news , 'newLimit' => $newsLimit ]);
    }
}
