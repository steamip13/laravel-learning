<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\GoodRequest;
use App\Http\Requests\EmailRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Good;
use App\Models\Order;
use App\Models\Admin;

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

        return redirect()->route('admin-categories');
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

        return redirect()->route('admin-goods');
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

    public function emails()
    {
        return view('layouts.admin-emails', ['emails' => Admin::all()]);
    }

    public function updateEmails($id)
    {
        $email = Admin::find($id);
        return view('layouts.update-emails', ['email' => $email]);
    }

    public function updateEmailsSubmit($id, EmailRequest $reg)
    {
        $email = Admin::find($id);
        $email->email_manager = $reg->input('email');

        $email->save();

        return redirect()->route('emails');
    }

    public function addEmails()
    {
        return view('layouts.add-emails');
    }

    public function AddEmailsSubmit(EmailRequest $reg)
    {
        $email = new Admin();
        $email->email_manager = $reg->input('email');

        $email->save();

        return redirect()->route('emails');
    }

    public function deleteEmails($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('emails');
    }
}
