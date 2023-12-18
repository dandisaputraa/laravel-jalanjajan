<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DestinasiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});



Route::get('/admin', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/products/{id}/edit', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Kuliner & destinasi
Route::get('/kuliner', [KulinerController::class, 'index']);
Route::get('/destinasi', [DestinasiController::class, 'index']);

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');
Route::get('/remove-item/{id}', [CartController::class, 'removeItem'])->name('cart.remove.item');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

// Checkout
Route::get('/order', [OrderController::class, 'showOrderForm'])->name('order.form');
Route::post('/order', [OrderController::class, 'placeOrder'])->name('order.place');