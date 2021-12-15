<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Good;
use App\Models\Category;
use App\Models\Order;

class GoodController extends Controller
{
    public function index()
    {
        $goods = Good::query()->orderBy('id', 'DESC')->paginate(6);
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
        $goods = Good::query()->with('category')->where('category_id', '=', $id)->paginate(6);
        return view('home',[
            'goods' => $goods,
            'category_id' => $id,
            'currentCategory' => Category::find($id)
        ]);
    }

    public function about()
    {
        return view('layouts.about');
    }
}
