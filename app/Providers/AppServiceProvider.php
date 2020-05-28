<?php

namespace CStoke\Providers;

use Illuminate\Support\ServiceProvider;
use CStoke\Product;
use CStoke\Observers\ProductObserver;

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
        Product::observe(ProductObserver::class);
    }
}
