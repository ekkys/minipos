<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Route::get('/suppliers/json', [SupplierController::class,'supplierjson'])->name('supplier.json');
Route::resource('suppliers', SupplierController::class);

Route::resource('categories', CategoryController::class);

Route::resource('customers', CustomerController::class);

Route::resource('products', ProductController::class);
