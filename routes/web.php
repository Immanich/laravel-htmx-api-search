<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/product', function () {
    return view('products');
})->name('product.index');

Route::get('/product/add-product', function () {
    return view('add-product');
})->name('product.add');
Route::post('/product/add-product', [ProductController::class, 'store'])->name('product.store');

Route::get('/contact', function () {
    return view('contact');
});