<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    public function index()
    {
        // return Inertia::render('Products/List', [
        //     'cart' => Product::all()
        // ]);
    }

    public function addItem(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = $request->session()->get('cart', []);

        $cart[$productId] = $quantity;

        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Item added to cart']);
    }

    public function getQuantity(string $id)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($id, $cart)) {
            return response()->json($cart[$id]);
        }
        return response()->json(0);
    }

    public function getCartLength()
    {
        $cart = session()->get('cart', []);

        $sum = array_reduce($cart, function ($prev, $item) {
            $prev += $item;
            return $prev;
        }, 0);
        return response()->json($sum);
    }
}
