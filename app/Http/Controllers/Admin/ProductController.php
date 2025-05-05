<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with(['category', 'seller']);

    if (auth()->user()->role == 'seller') {
        $query->where('user_id', auth()->id());
    }

    if ($request->has('keyword')) {
        $keyword = $request->input('keyword');
        $query->where('name', 'like', '%' . $keyword . '%');
    }

    $products = $query->latest()->paginate(10);

    return view('admin.products.index', compact('products'));
}



    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'description', 'price', 'category_id');
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $data['image'] = $fileName;
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Đã thêm sản phẩm!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Nếu user là seller thì phải kiểm tra quyền
    if (auth()->user()->role == 'seller' && $product->user_id != auth()->id()) {
        abort(403, 'Bạn không có quyền chỉnh sửa sản phẩm này');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only(['name', 'description', 'price', 'category_id']);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/uploads/products', $fileName);
        $data['image'] = $fileName;
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);

    if (auth()->user()->role == 'seller' && $product->user_id != auth()->id()) {
        abort(403, 'Bạn không có quyền xoá sản phẩm này');
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Xoá sản phẩm thành công!');
}


        public function trash()
    {
        $products = Product::onlyTrashed()->with('category', 'seller')->paginate(10);
        return view('admin.products.trash', compact('products'));
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('products.trash')->with('success', 'Khôi phục sản phẩm thành công');
    }
        public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->route('products.trash')->with('success', 'Đã xoá vĩnh viễn');
    }


}

