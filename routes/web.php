<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/products/create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('/products/edit/{id}', [AdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/update/{id}', [AdminController::class, 'update'])->name('admin.products.update');
   Route::delete('/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
});



Route::get('/contact', function () {
    return view('contact');
})->name('contact.show');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');