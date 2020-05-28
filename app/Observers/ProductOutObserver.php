<?php

namespace CStoke\Observers;

use Illuminate\Support\Facades\Auth;
use CStoke\ProductOut;

class ProductOutObserver
{
    public function saving(ProductOut $productOut)
    {

    }

    public function saved(ProductOut $productOut)
    {
        
    }

    public function creating(ProductOut $productOut)
    {
        $productOut->created_by = 1;
        $productOut->updated_by = 1;

        if( Auth::check() ){
            $productOut->created_by = Auth::id();
            $productOut->updated_by = Auth::id();
        }
    }

    /**
     * Handle the product in "created" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function created(ProductOut $productOut)
    {
        //
    }

    /**
     * Handle the product in "updated" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function updated(ProductOut $productOut)
    {
        //
    }

    /**
     * Handle the product in "deleted" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function deleted(ProductOut $productOut)
    {
        //
    }

    /**
     * Handle the product in "restored" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function restored(ProductOut $productOut)
    {
        //
    }

    /**
     * Handle the product in "force deleted" event.
     *
     * @param  \CStoke\ProductIn  $productIn
     * @return void
     */
    public function forceDeleted(ProductOut $productOut)
    {
        //
    }
}
