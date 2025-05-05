<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showProducts($id)
    {
        $category = Category::with('products')->findOrFail($id);
        return view('client.category_products', compact('category'));
    }
}

