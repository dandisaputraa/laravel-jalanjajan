<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
    
class KulinerController extends Controller
{
    public function index(){

        return view('kuliner',[
            'products' => ProductModel::latest()->get()
        ]);
    }

}
