<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::all();
        $reviews = \App\Models\Review::latest()->take(3)->get();
        return view('client.home', compact('products','categories', 'reviews'));
    }
    public function show($id)
    {
        $product = Product::with(['category', 'user'])->findOrFail($id);
        return view('client.product_detail', compact('product'));
    }
}
