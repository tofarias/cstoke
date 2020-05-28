<?php

namespace CStoke\Http\Controllers;

use Illuminate\Http\Request;
use CStoke\{Category,Manufacturer,Product,ProductOut};

class ProductOutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $products = $products->pluck('name', 'id');

        return view('productout.index', compact('products'));
    }

    public function showRegisterForm()
    {
        $products = Product::all();
        $products = $products->pluck('name', 'id');

        $manufacturer = Manufacturer::all();
        $manufacturers = $manufacturer->pluck('name', 'id');


        return view('productout.register_form', compact('products','manufacturers'));
    }

    public function insert(Request $request){

        $productOut = new ProductOut($request->all());
        $productOut->save();

        return redirect()->route('listProductsOut',[ date('Y-m-d') ]);
    }
}
