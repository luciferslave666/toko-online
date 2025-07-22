<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PageController; // <-- DITAMBAHKAN

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//== HALAMAN PUBLIK & TOKO ==//
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/about-us', [PageController::class, 'about'])->name('about');

//== KERANJANG & CHECKOUT ==//
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cart}', [CartController::class, 'destroy'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');


//== HALAMAN PENGGUNA (SETELAH LOGIN) ==//
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/my-orders', [OrderController::class, 'history'])->name('orders.history');
});


//== HALAMAN ADMIN (HANYA UNTUK ROLE ADMIN) ==//
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Rute dashboard admin bisa dibuat mengarah ke daftar pesanan
    Route::get('/dashboard', [OrderController::class, 'index'])->name('dashboard');

    // Rute untuk Pesanan
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    // Rute Resource untuk Produk
    Route::resource('products', AdminProductController::class);
});


//== FILE AUTENTIKASI DARI BREEZE ==//
require __DIR__.'/auth.php';