<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function news()
    {   
        $news = News::inRandomOrder()->limit(2)->get();
        return view('layouts.news', [
            'news' => $news,
        ]);
    }

    public function detail($id)
    {
        $news = News::find($id);
        return view('layouts.news-detail', [
            'news' => $news,
        ]);
    }
}
