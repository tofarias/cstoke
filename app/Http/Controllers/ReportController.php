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
        $productItens = \CStoke\ProductIn::where('product_in.created_at', 'like', $date.'%')
                                        ->join('product', 'product.id','=','product_in.product_id')
                                        ->join('prod_manufacturer', 'prod_manufacturer.id','=','product.manufacturer_id')
                                        ->select(
                                            'product.id',
                                            'product.name',
                                            'product.model',
                                            'product.sku',
                                            'prod_manufacturer.name as manufacturer_name',
                                            \DB::raw('(select sum(amount) from product_in p1 where p1.product_id = product_in.product_id  group by p1.product_id ) as amount'),
                                            \DB::raw("DATE_FORMAT(product_in.created_at, '%Y-%m-%d') as created_at")
                                            )->groupBy(
                                                'product.id',
                                                'product.name',
                                                'product.model',
                                                'product.sku',
                                                'prod_manufacturer.name',
                                                \DB::raw("DATE_FORMAT(product_in.created_at, '%Y-%m-%d')")
                                                )->get();
                                                
        $title = 'Produtos em estoque';
        $labelData = 'Dt. Entrada';

        return view('report.index',compact('productItens', 'title','labelData'));
    }

    /**
     * Quantos e quais produtos foram removidos do estoque
     * 
     * @return void
     */
    public function listProductsOut($date)
    {
        $productItens = \CStoke\ProductOut::where('product_out.created_at', 'like', $date.'%')
                                        ->join('product', 'product.id','=','product_out.product_id')
                                        ->join('prod_manufacturer', 'prod_manufacturer.id','=','product.manufacturer_id')
                                        ->select(
                                            'product.id',
                                            'product.name',
                                            'product.model',
                                            'product.sku',
                                            'prod_manufacturer.name as manufacturer_name',
                                            \DB::raw('(select sum(amount) from product_out p1 where p1.product_id = product_out.product_id  group by p1.product_id ) as amount'),
                                            \DB::raw("DATE_FORMAT(product_out.created_at, '%Y-%m-%d') as created_at")
                                            )->groupBy(
                                                'product.id',
                                                'product.name',
                                                'product.model',
                                                'product.sku',
                                                'prod_manufacturer.name',
                                                \DB::raw("DATE_FORMAT(product_out.created_at, '%Y-%m-%d')")
                                                )->get();
                                                
        $title = 'Produtos removidos do estoque';
        $labelData = 'Dt. Saída';

        return view('report.index',compact('productItens','title','labelData'));
    }
}
