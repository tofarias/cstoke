<?php

namespace CStoke\Http\Controllers;

use Illuminate\Http\Request;
use CStoke\{Category,Manufacturer,Product};
use CStoke\Http\Requests\ProductInsertRequest;

class ProductController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(['category','manufacturer'])->orderBy('created_at','desc');
        
        $total = $products->count();
        $products = $products->paginate(15);

        return view('product.index', compact('products','total'));
    }

    public function showRegisterForm()
    {
        $categories = Category::all();
        $categories = $categories->pluck('name', 'id');

        $manufacturer = Manufacturer::all();
        $manufacturers = $manufacturer->pluck('name', 'id');

        return view('product.register_form', compact('categories','manufacturers'));
    }

    public function insert(ProductInsertRequest $request){
        try{
            $validated = $request->validated();

            $product = new Product($request->all());
            $product->save();
            
            return redirect()->route('product.list');
        }catch (\Exception $e) {
            
            return redirect()
                        ->route('product.showRegisterForm')
                        ->with('exception', 'TESTE')
                        ->withInput();
        }
    }

    public function showEditForm(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();
        $categories = $categories->pluck('name', 'id');

        $manufacturer = Manufacturer::all();
        $manufacturers = $manufacturer->pluck('name', 'id');

        return view('product.edit_form', compact('product', 'categories','manufacturers'));
    }

    public function update(ProductInsertRequest $request)
    {
        try
        {
            $product = Product::findOrFail($request->id);
            $product->fill($request->all());
            $product->save();
            
            return redirect()->route('product.list');
        }catch (\Exception $e) {
                
            return redirect()
                        ->route('product.showRegisterForm')
                        ->with('exception', 'TESTE')
                        ->withInput();
        }
    }

    public function delete(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        
        return response()->json([
            'delete' => true,
            'id' => $product->id,
            'total' => Product::where('active', 1)->count(),
            'message' => 'Registro excluído com sucesso!'
        ]);
    }

    public function ajaxFindProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);

        return response()->json([
            'success' => true,
            'id' => $product->id,
            'manufacturer' => $product->manufacturer->name,
            'model' => $product->model,
            'sku' => $product->sku
        ]);
    }
}