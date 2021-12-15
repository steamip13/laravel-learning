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
        // $this->Route::middleware('auth');
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

        // Если не существует "открытого" заказа
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
}
