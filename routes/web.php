<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckCartBeforeOrder;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\isAdminMiddleware;
use App\Models\Order;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\User;

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

Route::get('/order', [OrderController::class, 'index'])->middleware([CheckLoginMiddleware::class, CheckCartBeforeOrder::class]);
Route::post('/order/add', [OrderController::class, 'store'])->middleware([CheckLoginMiddleware::class, CheckCartBeforeOrder::class]);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/signup', [AuthController::class, 'signup']);
Route::get('/auth/status', [AuthController::class, 'authStatus']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/signup', [AuthController::class, 'showSignup']);
Route::get('/login', [AuthController::class, 'showLogin']);

Route::group(['middleware' => [CheckLoginMiddleware::class, isAdminMiddleware::class]], function () {
    Route::get('/cms/panel', function (Request $request) {
        return Inertia::render('Admin/Panel', []);
    });

    Route::get('/cms/products', function (Request $request) {
        return Inertia::render('Products/List', [
            'products' => Product::orderBy('title', 'ASC')->get(),
            'adminDisplay' => true
        ]);
    });

    Route::get('/cms/products/delete/{product}', [ProductController::class, 'delete']);
    Route::get('/cms/addproduct', [ProductController::class, 'renderForm']);
    Route::post('/cms/addproduct', [ProductController::class, 'store']);
    Route::get('/cms/products/edit/{product}', function (Request $request, Product $product) {
        return Inertia::render('Admin/AddProduct', [
            'product' => $product
        ]);
    });
    Route::post('/cms/products/edit/{product}', [ProductController::class, 'update']);

    Route::get('/cms/orders', function (Request $request) {
        return Inertia::render('Admin/Orders', [
            'orders' => Order::all()
        ]);
    });

    Route::get('/cms/users', function (Request $request) {
        return Inertia::render('Admin/ShowUsers', [
            'users' => User::all()
        ]);
    });
    Route::get('/cms/users/admin/{user}', [UserController::class, 'makeAdmin']);
    Route::get('/cms/users/delete/{user}', [UserController::class, 'delete']);
});
