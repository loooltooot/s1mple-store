<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckCartBeforeOrder;
use App\Http\Middleware\CheckLoginMiddleware;

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
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->middleware([CheckLoginMiddleware::class, CheckCartBeforeOrder::class]);
Route::post('/cart/add', [CartController::class, 'addItem']);
Route::get('/cart/quantity/{id}', [CartController::class, 'getQuantity']);
Route::get('/cart/quantity', [CartController::class, 'getCartLength']);

Route::get('/order', [OrderController::class, 'index'])->middleware(CheckCartBeforeOrder::class);
Route::post('/order/add', [OrderController::class, 'store'])->middleware(CheckCartBeforeOrder::class);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/signup', [AuthController::class, 'signup']);
Route::get('/auth/status', [AuthController::class, 'authStatus']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/signup', [AuthController::class, 'showSignup']);
Route::get('/login', [AuthController::class, 'showLogin']);
