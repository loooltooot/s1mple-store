<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Products/List', [
            'products' => Product::orderBy('title', 'ASC')->get()
        ]);
    }

    public function show(Product $product)
    {
        return Inertia::render('Products/Show', [
            'product' => $product
        ]);
    }

    public function delete(Product $product)
    {
        $product->delete();
        Storage::delete('public/images/' . $product['img']);

        return redirect('/cms/products');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $price = $request->input('price');
        $file = $request->file('img');
        $img = pathinfo($file->store('public/images/'))['basename'];

        $product = new Product();
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->img = $img;
        $product->save();

        return redirect('/cms/products');
    }

    public function update(Request $request, Product $product)
    {
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->img = $product['img'];
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $product->img = pathinfo($file->store('public/images/'))['basename'];
        }

        $product->save();

        return redirect('/cms/products');
    }

    public function renderForm()
    {
        return Inertia::render('Admin/AddProduct', []);
    }
}
