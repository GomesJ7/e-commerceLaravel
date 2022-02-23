<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('admin');
    }
 
    public function save(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
         'name' => 'required',
         'price' => 'required',
         'stock' => 'required',
 
        ]);
        
        
        
        $request->file('image')->store('images', 'public');
        /*$name = $request->file('image')->getClientOriginalName();*/
        $name = $request->get('name');
        $description = $request->get('description');
        $path = $request->file('image')->hashName();
        $price = $request->get('price');
        $stock = $request->get('stock');
 
 
        $save = new Product; 
        $save->name = $name;
        $save->description = $description;        
        $save->path = $path;
        $save->price = $price;
        $save->stock = $stock;
                        
        $save->save();
 
        return redirect('upload-image')->with('status', 'Image Has been uploaded');
 
    }
}

