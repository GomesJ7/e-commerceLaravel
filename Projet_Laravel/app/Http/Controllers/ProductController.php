<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index () {
        $products = Product::all();
        return view('catalogue', ['products' => $products]);
    }

    function show($id) {
        $product = Product::find($id);
        if (!$product)
            return 'Error 404';
        return view('product', ['product' => $product]);
    }

    function update(Request $request) 
    {
        $product=Product::find($request->id);
        $product->stock=$request->stock;
        $product->save();
        return redirect()->back();
    }
}
