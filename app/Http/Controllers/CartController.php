<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request , $id){
        // dd($request->all());

        $validatedData = $request->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
            'product_code' => 'required',
            'qty' => 'required',
            'total_price' => 'required'
            ]);

        $produk = ProductModel::findOrFail($request->id);

        if ($request->filled('total_price')) {
            $validatedData['total_price'] = $produk->product_price * $request->qty ; // Nilai default jika tidak ada inputan
        }
        if ($produk->product_qty < $request->qty ) {
            return redirect()->back()->with('error', 'Maaf, Stok Obat tidak mencukupi!');
        
        } else if ( $request->qty <= 0 ){
            return redirect()->back()->with('error', 'Format Salah!');
        } 
        
        else { 
            
        CartModel::create($validatedData);

        $produk = ProductModel::findOrFail($request->id);
        $produk->product_qty -= $request->qty;
        $produk->save();

        }

        return redirect('cart');      
    }

   
    public function index()
    {
        $carts = CartModel::all();
        $grandTotal = CartModel::sum('total_price');
        return view('cart.index', compact('carts', 'grandTotal'));
    }

    public function updateQuantity(Request $request)
    {
        $carts = CartModel::find($request->id);

        $carts->qty = $request->qty;
        $carts->total_price = $request->qty * $request->product_price;

        $carts->save();

        return response()->json(['message' => 'Cart item updated successfully.']);
    }

    public function removeItem($id)
    {
        $carts = CartModel::find($id);
        $carts->delete();

        return redirect()->route('cart.index')->with('showAlert', 'block')->with('message', 'Item removed from the cart successfully.');
    }

    public function clearCart()
    {
        CartModel::truncate();

        return redirect()->route('cart.index')->with('showAlert', 'block')->with('message', 'Cart cleared successfully.');
    }
}
