<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;




class OrderController extends Controller
{
    public function showOrderForm()
    {
        $grandTotal = 0;
        $allItems = '';
        $items = CartModel::selectRaw('CONCAT(product_name, "(", qty, ")") AS itemQty, total_price')
            ->get();

        foreach ($items as $item) {
            $grandTotal += $item->total_price;
            $itemsArray[] = $item->itemQty;
        }

        $allItems = implode(', ', $itemsArray);

        return view('order.form',[
            'allItems' => $allItems,
            'grand_total' => $grandTotal
        ]);
    }
    public function placeOrder(Request $request)
    {
        // Lakukan validasi formulir sesuai kebutuhan
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'pmode' => 'required|string',
            'products' => 'required|string',
            'amount_paid' => 'required|numeric',
        ]);

        OrderModel::create($validatedData);

        CartModel::truncate();

        return redirect('/kuliner')->with('success', 'Product added successfully');
    }
}

