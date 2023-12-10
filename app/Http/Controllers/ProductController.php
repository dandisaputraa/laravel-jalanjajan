<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $hasil = ProductModel::All();
        return view ('products.index',['products' => $hasil]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_image' => 'image|file|max:2024',
            'product_code' => 'required',
            'category' => 'required',
        ]);

        if($request->product_image) {
            $file = $request->product_image->getClientOriginalName();
            $image = $request->product_image->storeAs('image', $file);
            $validatedData['product_image'] = $image;
        }

        ProductModel::create($validatedData);


        return redirect('/admin')->with('success', 'Product added successfully');
    }

    public function edit(Request $request)
    {
        $products = ProductModel::find($request->id);
        return view('products.edit',compact('products'));
    }
    
    public function update(Request $request,$id){

        $produk = ProductModel::find($id);

        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_image' => 'image|file',
            'product_code' => 'required',
            'category' => 'required'
        ]);


        if($request->file('product_image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $file = $request->product_image->getClientOriginalName();
            $validatedData['product_image'] = $request->file('product_image')->storeAs('image',$file);
        }

        ProductModel::where('id',$produk->id)->update($validatedData);

        return redirect('/admin');
        
    }

    public function delete($id){
        $products = ProductModel::find($id);
        $products->delete();
        return redirect('/admin');

    }

    

}

