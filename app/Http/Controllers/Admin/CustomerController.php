<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function orders($id)
    {
        $customer = User::findOrFail($id);
        $orders = $customer->orders()->with('items.product')->latest()->get();
        return view('admin.customers.orders', compact('customer', 'orders'));
    }
}
