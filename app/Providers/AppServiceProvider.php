<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $categories = ProductCategory::all();
        View::share('categories',$categories);
        $num_product = Product::all()->count();
        View::share('num_product', $num_product);
        $num_order = Order::all()->count();
        View::share('num_order', $num_order);
    }
}
