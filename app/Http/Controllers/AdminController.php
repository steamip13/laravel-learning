<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\GoodRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Good;
use App\Models\Order;

class AdminController extends Controller
{
    public function admin()
    {
        return view('layouts.admin');
    }

    public function goods()
    {
        return view('layouts.admin-goods', ['goods' => Good::all()]);
    }

    public function categories()
    {
        
        return view('layouts.admin-categories', [
            'categories' => Category::all(),
        ]);
    }

    public function updateCategory($id)
    {
        $category = Category::find($id);
        return view('layouts.update-category', ['category' => $category]);
    }

    public function updateCategorySubmit($id, CategoryRequest $reg)
    {
        $category = Category::find($id);
        $category->title = $reg->input('title');
        $category->description = $reg->input('description');

        $category->save();

        return redirect()->route('admin-categories', $id);
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin-categories');
    }

    public function addCategory()
    {
        return view('layouts.add-category');
    }

    public function addCategorySubmit(CategoryRequest $reg)
    {
        $category = new Category();
        $category->title = $reg->input('title');
        $category->description = $reg->input('description');

        $category->save();

        return redirect()->route('admin-categories');
    }

    public function updateGood($id)
    {
        $good = Good::find($id);
        return view('layouts.update-good', ['good' => $good]);
    }

    public function updateGoodSubmit($id, GoodRequest $reg)
    {
        $good = Good::find($id);
        $good->title = $reg->input('title');
        $good->description = $reg->input('description');
        $good->category_id = $reg->input('category_id');
        $good->price = $reg->input('price');

        $good->save();

        return redirect()->route('admin-goods', $id);
    }

    public function addGood()
    {
        return view('layouts.add-good');
    }

    public function AddGoodSubmit(GoodRequest $reg)
    {
        $good = new Good();
        $good->title = $reg->input('title');
        $good->description = $reg->input('description');
        $good->category_id = $reg->input('category_id');
        $good->price = $reg->input('price');

        $good->save();

        return redirect()->route('admin-goods');
    }

    public function deleteGood($id)
    {
        Good::find($id)->delete();
        return redirect()->route('admin-goods');
    }

    public function orderAdmin()
    {
        $orderCurrent = Order::where('state', '=', Order::STATE_CURRENT)->get();
        $orderProcessed = Order::where('state', '=', Order::STATE_PROCESSED)->get();

        $goodsCurrent = new \Illuminate\Database\Eloquent\Collection;
        $goodsProcessed = new \Illuminate\Database\Eloquent\Collection;

        $orderProcessed = $orderProcessed->each(function($item) use ($goodsProcessed) {
            $goodsProcessed->push($item->goods);
        });
        $orderCurrent = $orderCurrent->each(function($item) use ($goodsCurrent) {
            $goodsCurrent->push($item->goods);
        });

        return view('layouts.admin-order', [
            'orderCurrent' => $goodsCurrent,
            'orderProcessed' => $goodsProcessed,
        ]);
    }

}
