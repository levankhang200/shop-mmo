<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Admin\CustomerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Đăng nhập - Đăng ký
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', fn () => 'Admin Dashboard')->name('admin.dashboard');
    Route::get('/home', fn () => view('admin.home'));

    Route::resource('products', ProductController::class)->except(['show']);
    Route::get('products-trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::post('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');

    Route::resource('categories', CategoryController::class)->except(['show']);

    // Quản lý khách hàng & đơn hàng
    Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('customers/{id}/orders', [CustomerController::class, 'orders'])->name('admin.customers.orders');
});

// SELLER
Route::get('/seller/dashboard', fn () => 'Seller Dashboard')->middleware(['auth', 'seller'])->name('seller.dashboard');

// CLIENT
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('client.product.detail');
Route::get('/search', [HomeController::class, 'search'])->name('client.search');
Route::get('/category/{id}', [ClientCategoryController::class, 'showProducts'])->name('client.category.products');


// Đơn hàng
Route::get('/orders', [OrderController::class, 'index'])->name('client.orders.index');
Route::post('/add-to-order', [OrderController::class, 'store'])->name('client.orders.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('client.orders.show');
Route::get('/orders/{order}/pay', [OrderController::class, 'pay'])->name('client.orders.pay');
Route::post('/orders/{order}/pay', [OrderController::class, 'processPayment'])->name('client.orders.process');


Route::middleware(['auth'])->group(function () {
    Route::get('/account', [\App\Http\Controllers\Client\AccountController::class, 'index'])->name('client.account');
    Route::post('/account', [\App\Http\Controllers\Client\AccountController::class, 'update'])->name('client.account.update');
});


Route::get('/contact', [App\Http\Controllers\Client\ContactController::class, 'show'])->name('client.contact');
Route::post('/contact', [App\Http\Controllers\Client\ContactController::class, 'submit'])->name('client.contact.submit');



