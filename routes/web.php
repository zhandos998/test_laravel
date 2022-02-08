<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products_view'])->name('home');
Route::get('/products/{id}', [App\Http\Controllers\HomeController::class, 'products_view'])->name('home');
Route::post('/basket_add', [App\Http\Controllers\HomeController::class, 'basket_add'])->name('basket_add');
Route::get('/basket', [App\Http\Controllers\HomeController::class, 'basket'])->name('basket');
Route::get('/basket/{id}', [App\Http\Controllers\HomeController::class, 'basket'])->name('basket');
Route::post('/delete_basket', [App\Http\Controllers\HomeController::class, 'delete_basket'])->name('delete_basket');
Route::post('/buy', [App\Http\Controllers\HomeController::class, 'buy'])->name('buy');

Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager');
Route::get('/manager/products', [App\Http\Controllers\ManagerController::class, 'products'])->name('products');
Route::get('/manager/add_product', [App\Http\Controllers\ManagerController::class, 'add_product'])->name('add_product');
Route::post('/manager/add_product', [App\Http\Controllers\ManagerController::class, 'add_product'])->name('add_product');
Route::get('/manager/change_product/{id}', [App\Http\Controllers\ManagerController::class, 'change_product'])->name('change_product');
Route::post('/manager/change_product/{id}', [App\Http\Controllers\ManagerController::class, 'change_product'])->name('change_product');
Route::get('/manager/delete_product/{id}', [App\Http\Controllers\ManagerController::class, 'delete_product'])->name('delete_product');

Route::get('/manager/orders', [App\Http\Controllers\ManagerController::class, 'orders'])->name('order');