<?php

namespace CStoke\Observers;

use Illuminate\Support\Facades\Auth;
use CStoke\ProductIn;

class ProductInObserver
{
    public function saving(ProductIn $productIn)
    {

    }

    public function saved(ProductIn $productIn)
    {
        
    }

    public function creating(ProductIn $productIn)
    {
        $productIn->sku = \sku();

        $productIn->created_by = 1;
        $productIn->updated_by = 1;

        if( Auth::check() ){
            $productIn->created_by = Auth::id();
            $productIn->updated_by = Auth::id();
        }
    }

    /**
     * Handle the product in "created" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function created(ProductIn $productIn)
    {
        //
    }

    /**
     * Handle the product in "updated" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function updated(ProductIn $productIn)
    {
        //
    }

    /**
     * Handle the product in "deleted" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function deleted(ProductIn $productIn)
    {
        //
    }

    /**
     * Handle the product in "restored" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function restored(ProductIn $productIn)
    {
        //
    }

    /**
     * Handle the product in "force deleted" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function forceDeleted(ProductIn $productIn)
    {
        //
    }
}
