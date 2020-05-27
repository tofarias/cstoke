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
        $productsIn = $productsIn->whereHas('product',function($query){
            return $query->where('active',1);
        })->get();

        //dd( Array('itens' => $productsIn->toArray(), 'total' => $productsIn->count()) );

        return view('home');
    }

    /**
     * Quantos e quais produtos foram removidos do estoque
     * 
     * @return void
     */
    public function listProductsOut($date)
    {
        $productsOut = new \CStoke\ProductIn();

        $productsOut = $productsOut->where('created_at', 'like', $date.'%');
        $productsOut = $productsOut->whereHas('product',function($query){
            return $query->where('active',1);
        })->get();

        //dd( Array('itens' => $productsOut->toArray(), 'total' => $productsOut->count()) );

        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
