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
        $productItens = $productsIn->whereHas('product',function($query){
            return $query->where('active',1);
        })->orderBy('created_at','desc');

        $total = $productItens->count();
        $productItens = $productItens->paginate(15);        
        $title = 'Produtos em estoque';
        $labelData = 'Dt. Entrada';

        return view('report.index',compact('productItens','total', 'title','labelData'));
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
        $productItens   = $productsOut->whereHas('product',function($query){
            return $query->where('active',1)->select(['sku']);
        })->orderBy('created_at','desc');

        $total = $productItens->count();
        $productItens = $productItens->paginate(15);
        $title = 'Produtos removidos do estoque';
        $labelData = 'Dt. Saída';

        return view('report.index',compact('productItens','total', 'title','labelData'));
    }
}
