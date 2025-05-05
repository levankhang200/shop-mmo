<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::where('user_id', Auth::id())->latest()->get();
    return view('client.orders.index', compact('orders'));
}

public function store(Request $request)
{
    $product = Product::findOrFail($request->product_id);

    $order = Order::create([
        'user_id' => Auth::id(),
        'total_price' => $product->price,
        'status' => 'pending',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => 1,
        'price' => $product->price,
    ]);

    return redirect()->route('client.orders.show', $order->id)->with('success', 'Đã thêm vào đơn hàng!');
}
public function show($id)
{
    $order = Order::with('items.product')->where('id', $id)->where('user_id', auth()->id())->firstOrFail();
    return view('client.orders.show', compact('order'));
}

public function pay(Order $order)
{

    // Check quyền user (chỉ cho thanh toán đơn hàng của mình)
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }
    // Kiểm tra trạng thái đơn hàng


    return view('client.orders.pay', compact('order'));

}

public function processPayment(Request $request, Order $order)
{
    if ($order->user_id !== auth()->id()) abort(403);

    $order->status = 'completed';
    $order->save();

    return redirect()->route('client.orders.index')->with('success', '🎉 Thanh toán thành công!');
}




}
