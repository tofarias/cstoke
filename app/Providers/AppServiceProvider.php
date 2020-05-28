<?php

namespace CStoke\Providers;

use Illuminate\Support\ServiceProvider;
use CStoke\{Product,ProductIn,ProductOut};
use CStoke\Observers\{ProductObserver,ProductInObserver,ProductOutObserver};

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
        ProductIn::observe(ProductInObserver::class);
        ProductOut::observe(ProductOutObserver::class);
    }
}
