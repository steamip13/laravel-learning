<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Good;

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
    }
}
