<?php

namespace CStoke\Http\Controllers;

use Illuminate\Http\Request;
use CStoke\{Category,Manufacturer,Product,ProductIn};

class ProductInController extends Controller
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

        return view('productin.index', compact('products'));
    }

    public function showRegisterForm()
    {
        $products = Product::all();
        $products = $products->pluck('name', 'id');

        $manufacturer = Manufacturer::all();
        $manufacturers = $manufacturer->pluck('name', 'id');


        return view('productin.register_form', compact('products','manufacturers'));
    }

    public function insert(Request $request){

        $productIn = new ProductIn($request->all());
        $productIn->save();

        return redirect()->route('listProductsIn',['2020-05-28']);
    }

    public function showEditForm(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();
        $categories = $categories->pluck('name', 'id');

        $manufacturer = Manufacturer::all();
        $manufacturers = $manufacturer->pluck('name', 'id');

        return view('productin.edit_form', compact('product', 'categories','manufacturers'));
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->fill($request->all());
        $product->save();
        
        return redirect()->route('productin.list');
    }

    public function delete(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        
        return response()->json([
            'delete' => true,
            'id' => $product->id,
            'message' => 'Registro excluído com sucesso!'
        ]);
    }
}
