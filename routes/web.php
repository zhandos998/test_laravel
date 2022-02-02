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

Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

Route::get('/Product', [App\Http\Controllers\HomeController::class, 'product'])->name('Product');
// Route::get('/Product/{id}', [App\Http\Controllers\HomeController::class, 'product'])->name('Product');
Route::post('/Product', [App\Http\Controllers\HomeController::class, 'product'])->name('Product');
Route::get('/Product/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/addProduct', [App\Http\Controllers\HomeController::class, 'addProduct'])->name('addProduct');

Route::get('/changeProduct/{id}', [App\Http\Controllers\HomeController::class, 'changeProduct'])->name('changeProduct');
Route::post('/changeProduct/{id}', [App\Http\Controllers\HomeController::class, 'changeProduct'])->name('changeProduct');

Route::get('/Status', [App\Http\Controllers\HomeController::class, 'status'])->name('status');
Route::post('/addStatus', [App\Http\Controllers\HomeController::class, 'addStatus'])->name('addStatus');
Route::post('/deleteStatus', [App\Http\Controllers\HomeController::class, 'deleteStatus'])->name('deleteStatus');
Route::post('/changeStatus', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('changeStatus');

Route::get('/all_Products', [App\Http\Controllers\HomeController::class, 'all_Products'])->name('all_Products');
Route::get('/all_Products/{id}', [App\Http\Controllers\HomeController::class, 'add_basket'])->name('all_Products');
Route::get('/Order/{id}', [App\Http\Controllers\HomeController::class, 'orderbuy'])->name('orderbuy');
Route::get('/Order', [App\Http\Controllers\HomeController::class, 'order'])->name('order');
Route::get('/Orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
Route::post('/Orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');

Route::post('/all_Products', [App\Http\Controllers\HomeController::class, 'ordered'])->name('ordered');

Route::get('/change_order/{id}', [App\Http\Controllers\HomeController::class, 'change_order'])->name('change_order');
