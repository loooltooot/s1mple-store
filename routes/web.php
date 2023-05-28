<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\CheckCartBeforeOrder;

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

Route::get('/', [ProductController::class, 'index']);

Route::get('/cart', [CartController::class, 'index'])->middleware(CheckCartBeforeOrder::class);
Route::post('/cart/add', [CartController::class, 'addItem']);
Route::get('/cart/quantity/{id}', [CartController::class, 'getQuantity']);
Route::get('/cart/quantity', [CartController::class, 'getCartLength']);

Route::get('/order', [OrderController::class, 'index'])->middleware(CheckCartBeforeOrder::class);
Route::post('/order/add', [OrderController::class, 'store'])->middleware(CheckCartBeforeOrder::class);
