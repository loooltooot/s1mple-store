<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $ids = array_keys($request->session()->get('cart', []));
        return Inertia::render('Cart/Cart', [
            'cart' => Product::whereIn('id', $ids)->get()
        ]);
    }

    public function addItem(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = $request->session()->get('cart', []);

        if ($quantity === 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $quantity;
        }

        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Item added to cart']);
    }

    public function getQuantity(Request $request, string $id)
    {
        $cart = $request->session()->get('cart', []);
        if (array_key_exists($id, $cart)) {
            return response()->json($cart[$id]);
        }
        return response()->json(0);
    }

    public function getCartLength(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $sum = array_reduce($cart, function ($prev, $item) {
            $prev += $item;
            return $prev;
        }, 0);
        return response()->json($sum);
    }
}
