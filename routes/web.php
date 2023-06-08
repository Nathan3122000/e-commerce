<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PageController::class,'home'])->name('page.home');
Route::get('/shop',[PageController::class,'shop'])->name('page.shop');
Route::get('/item/{product}/product',[PageController::class,'product'])->name('page.product');
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('cart.add');
Route::post('get-cart',[CartController::class,'getCart'])->name('cart.get');

Route::middleware(['auth'])->group(function(){
    Route::get('/profile',[PageController::class,'profile'])->name('page.profile');
    Route::get('/order/{order}',[PageController::class,'orderDetail'])->name('page.order');
    Route::get('/cart',[PageController::class,'cart'])->name('page.cart');
    Route::get('/wishlist',[PageController::class,'wishlist'])->name('page.wishlist');
    Route::get('/checkout',[PageController::class,'checkout'])->name('page.checkout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('cart-user',[AdminController::class,'cart'])->name('cart.user');
    Route::get('get/order/{name}',[OrderController::class,'index'])->name('order.filter');
    Route::resource('customer',App\Http\Controllers\CustomerController::class);
    Route::resource('payment-method',App\Http\Controllers\PaymentMethodController::class);
    Route::resource('shipment',App\Http\Controllers\ShipmentController::class);
    Route::resource('category',App\Http\Controllers\CategoryController::class);
    Route::resource('product',App\Http\Controllers\ProductController::class);
    Route::resource('cart',App\Http\Controllers\CartController::class);
    Route::resource('order',App\Http\Controllers\OrderController::class);
    Route::resource('order-detail',App\Http\Controllers\OrderDetailController::class);
});
Route::resource('like',App\Http\Controllers\LikeController::class);
