<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Category;

class GoodController extends Controller
{
    public function index()
    {
        $goods = Good::query()->get();
        return view('home',[
            'goods' => $goods,
        ]);
    }

    public function good(int $id)
    {
        $good = Good::query()->with('category')->find($id);
        return view('layouts.good',[
            'good' => $good,
        ]);
    }

    public function category(int $id)
    {
        $goods = Good::query()->with('category')->where('category_id', '=', $id)->get();
        $goods_test = Good::all();
        return view('home',[
            'goods' => $goods,
            'category_id' => $id,
            'currentCategory' => Category::find($id)
        ]);
    }
}
