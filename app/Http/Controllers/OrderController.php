<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Good;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderGood;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompleted;
use App\Mail\OrderCompletedManager;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buy(int $id)
    {
        $good = Good::find($id);

        // Если не существует товара
        if (!$good) {
            return redirect()->route('home');
        }

        // Ищем "открытый" заказа
        $currentOrder = Order::getCurrentOrder(Auth::id());

        // Если не существует "открытого" заказа, то создаем его
        if (!$currentOrder) {
            ($currentOrder = new Order([
                'user_id' => Auth::id(),
                'state' => Order::STATE_CURRENT,
            ]))->save();
        }

        // Создаем заказ с товарами
        (new OrderGood([
            'order_id' => $currentOrder->id,
            'good_id' => $id,
            ]))->save();

        return redirect()->route('order-current');
    }
    
    public function current()
    {
        $order = Order::getCurrentOrder(Auth::id());

        return view('layouts.order-current', [
            'goods' => $order->goods ?? [],
            'sum' => $order ? $order->getSum() : 0,
        ]);
    }

    public function process()
    {
        $currentOrder = Order::getCurrentOrder(Auth::id());

        if (!$currentOrder) {
            return redirect()->route('home');
        }
        Mail::to(User::query()->find(Auth::user()->id))->send(new OrderCompleted());
        Mail::to(User::EMAIL_ADMIN)->send(new OrderCompletedManager($currentOrder, Auth::user()));
        $currentOrder->saveAsProcessed();

        return view('layouts.order-process');
    }

    public function close()
    {
        $orderOne = Order::where('user_id', '=', Auth::id())
        ->where('state', '=', Order::STATE_PROCESSED)
        ->first();
        $orderAll = Order::where('user_id', '=', Auth::id())
        ->where('state', '=', Order::STATE_PROCESSED)
        ->get();

        $goodsItem = new \Illuminate\Database\Eloquent\Collection;
        $orderAll = $orderAll->each(function($item) use ($goodsItem) {
            $goodsItem->push($item->goods);
        });

        return view('layouts.order-close', [
            'orderAll' => $goodsItem,
        ]);
    }
}
