<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Good;
use App\Models\Order;
use App\Models\OrderGood;

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

        $currentOrder->saveAsProcessed();

        return view('layouts.order-process');
    }

    public function close()
    {
        $orderAll = Order::where('user_id', '=', Auth::id())
        ->where('state', '=', Order::STATE_PROCESSED)
        ->get();
        $goodsItem = new \Illuminate\Database\Eloquent\Collection;
        foreach ($orderAll as $item) {
            $goodsItem = $goodsItem->merge($item->goods);
        }
        return view('layouts.order-close', [
            'goods' => $goodsItem,
        ]);
    }
}
