<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Good;
use App\Models\News;

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
        view()->composer('layouts.categories', function ($view) {
            $view->with(['categories' => Category::all()]);
        });
        view()->composer('layouts.footer', function ($view) {
            $view->with(['randomGood' => Good::all()->random()]);
        });
        view()->composer(['layouts.about', 'layouts.good'], function ($view) {
            $view->with(['goodsView' => Good::inRandomOrder()->limit(3)->get()]);
        });
        view()->composer('layouts.news-left-sidebar', function ($view) {
            $view->with(['lastNews' => News::orderBy('created_at', 'DESC')->limit(3)->get()]);
        });
    }
}
