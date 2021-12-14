<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function news()
    {   
        $news = News::inRandomOrder()->limit(2)->get();
        return view('layouts.news', [
            'news' => $news,
        ]);
    }
}
