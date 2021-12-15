<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Good;
use App\Models\News;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $sumGoods = 0;

        view()->composer('layouts.header', function ($view) use ($sumGoods) {
            $id = Auth::id();
            if ($id) {
                $currentOrder = Order::getCurrentOrder($id);

                if ($currentOrder) {
                    $sumGoods = $currentOrder->goods->count();
                }
            }

            $view->with(['sumGoods' => $sumGoods]);
        });

        view()->composer('layouts.categories', function ($view) {
            $view->with(['categories' => Category::all()]);
        });
        view()->composer('layouts.footer', function ($view) {
            $view->with(['randomGood' => Good::all()->random()]);
        });
        view()->composer(['layouts.about', 'layouts.good', 'layouts.news-detail'], function ($view) {
            $view->with(['goodsView' => Good::inRandomOrder()->limit(3)->get()]);
        });
        view()->composer('layouts.news-left-sidebar', function ($view) {
            $view->with(['lastNews' => News::orderBy('created_at', 'DESC')->limit(3)->get()]);
        });
    }
}
