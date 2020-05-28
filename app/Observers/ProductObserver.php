<?php

namespace CStoke\Observers;

use CStoke\Product;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    public function saving(Product $product)
    {

    }

    public function saved(Product $product)
    {
        
    }

    public function creating(Product $product)
    {
        $product->sku = \sku();

        $product->created_by = 1;
        $product->updated_by = 1;

        if( Auth::check() ){
            $product->created_by = Auth::id();
            $product->updated_by = Auth::id();
        }
    }

    /**
     * Handle the product "created" event.
     *
     * @param  \CStoke\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \CStoke\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \CStoke\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \CStoke\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \CStoke\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
