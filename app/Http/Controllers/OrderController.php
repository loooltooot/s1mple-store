<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Notifications\SendTgNotification;
use Inertia\Inertia;
use Inertia\Response;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $ids = array_keys($cart);
        $productsInCart = Product::whereIn('id', $ids)->get();

        $sum = array_reduce($productsInCart->toArray(), function ($prev, $item) use ($cart) {
            $prev += $item['price'] * $cart[$item['id']];
            return $prev;
        }, 0);

        return Inertia::render('Order/Order', [
            'sum' => $sum
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $tel = $request->input('tel');
        $city = $request->input('city');
        $street = $request->input('street');
        $construction = $request->input('construction');
        $apartment = $request->input('apartment');
        $sum = $request->input('sum');
        $cart = $request->session()->get('cart', []);
        $extendedRecepeit = '';
        $ids = array_keys($cart);
        $productsInCart = Product::whereIn('id', $ids)->get();

        $recepeit = array_reduce($ids, function ($prev, $id) use ($cart) {
            $prev .= $id . '|' . $cart[$id] . '&';
            return $prev;
        }, '');
        $recepeit = substr($recepeit, 0, strlen($recepeit) - 1);

        $extendedRecepeit = array_reduce($productsInCart->toArray(), function ($prev, $item) use ($cart) {
            $prev .= $cart[$item['id']] . 'x ' . $item['title'] . ', ';
            return $prev;
        }, '');
        $extendedRecepeit = substr($extendedRecepeit, 0, strlen($extendedRecepeit) - 1);

        $details = "Имя: $name\nФамилия: $surname\nТелефон: $tel\nГород: $city\nУлица: $street\nДом: $construction\nКвартира: $apartment\nСостав: $extendedRecepeit\nСумма: " . $sum . "₽";

        $order = new Order();
        $order->details = $details;
        $order->recepeit = $recepeit;
        $order->save();

        $order->notify(new SendTgNotification($details, 'toTelegram'));
        $request->session()->forget('cart');

        return redirect('/');
    }
}
