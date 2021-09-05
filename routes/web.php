<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
/* Route::get('/', function () {
    return view('welcome');
}); */


Route::middleware(['auth','isAdmin'])->group(function () {


Route::get('/choose/product/{id}', [CartController::class,'index'])->name('product.choose.product');
Route::get('/myProducts', [CartController::class,'myProducts'])->name('myProducts');
Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/checkouts',[CheckoutController::class,'sendCheckout'])->name('sendCheckout');
/* Route::post('/fetch',[CheckoutController::class,'fetch'])->name('fetch'); */
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
/* Route::get('/myCart',[CartController::class,'myCart'])->name('myCart'); */
/* Route::get('/profile',[CheckoutController::class,'total'])->name('profile'); */


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logouts');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
/* Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'profiledit'])->name('profile.update'); */
});
Route::middleware(['auth'])->group(function () {
    Route::get('/all/products', [homeController::class,'index'])->name('user.products');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/product', ProductController::class);
    Route::get('/choose/product/{id}', [CartController::class,'index'])->name('product.choose.product');
Route::get('/myProducts', [CartController::class,'myProducts'])->name('myProducts');
Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/checkouts',[CheckoutController::class,'sendCheckout'])->name('sendCheckout');
Route::get('/profile',[ProfileController::class,'index'])->name('profile');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logouts');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

});

