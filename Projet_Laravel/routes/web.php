<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CartController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', function () {
    if (! Gate::allows('access-admin')) {
        return 'ACCESS DENIED';
    }
    return view('admin');
});

Route::get('/catalogue', [App\Http\Controllers\HomeController::class, 'index'])->name('catalogue');
Route::get('/catalogue', [ProductController::class, 'index']);

Route::get('upload-image', [UploadImageController::class, 'index']);
Route::post('save', [UploadImageController::class, 'save']);

Route::post('edit', [ProductController::Class, 'update']);
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.id');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::post('cart.checkout', [CartController::class, 'checkout'])->name('cart.checkout');
