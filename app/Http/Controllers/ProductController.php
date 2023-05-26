<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index() {
        return Inertia::render('Products/List', [
            'products' => Product::all()
        ]);
    }
}