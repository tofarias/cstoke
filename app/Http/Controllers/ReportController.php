<?php

namespace CStoke\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    /**
     * Quantos e quais produtos foram adicionados ao estoque.
     * 
     * @return void
     */
    public function listProductsIn($date)
    {
        $productsIn = new \CStoke\ProductIn();

        $productsIn = $productsIn->where('created_at', 'like', $date.'%');
        $products = $productsIn->whereHas('product',function($query){
            return $query->where('active',1);
        })->orderBy('created_at','desc')->paginate(15);

        $total = $products->count();

        $title = 'Produtos em estoque';

        return view('report.index',compact('products','total', 'title'));
    }

    /**
     * Quantos e quais produtos foram removidos do estoque
     * 
     * @return void
     */
    public function listProductsOut($date)
    {
        $productsOut = new \CStoke\ProductOut();

        $productsOut = $productsOut->where('created_at', 'like', $date.'%');
        $products   = $productsOut->whereHas('product',function($query){
            return $query->where('active',1);
        })->orderBy('created_at','desc')->paginate(15);

        $total = $products->count();

        $title = 'Produtos removidos do estoque';

        return view('report.index',compact('products','total', 'title'));
    }
}
