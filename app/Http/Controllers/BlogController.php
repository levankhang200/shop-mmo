<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $products = Product::latest()->get();
        $categories = Category::all();
        $reviews = Review::latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        return view('client.home', compact('products', 'categories', 'reviews', 'blogs'));
    }
}
