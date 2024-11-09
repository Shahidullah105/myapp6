<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', function () {
    return view('layouts.master');
}); 

Route::get('/dashboard2', function () {
    return view('admin.dashboard.index')->name('customer');
});

//Route::get('/customer', function () {
  //  return view('admin.customer.add');
//});
Route::get('/show/customer', [CustomerController::class, 'show'])->middleware('auth');
Route::get('/edit/customer/{id}', [CustomerController::class, 'edit'])->middleware('auth');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer')->middleware('auth');
Route::post('/customer/submit', [CustomerController::class, 'create'])->middleware('auth');

Route::post('/customer/update', [CustomerController::class, 'update'])->middleware('auth');
Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->middleware('auth');

Route::get('/product', [ProductController::class, 'add'])->name('product')->middleware('auth');
Route::get('/product/submit', [ProductController::class, 'store'])->middleware('auth');
Route::post('/product/submit', [ProductController::class, 'create'])->middleware('auth');
Route::get('/product/show', [ProductController::class, 'show'])->middleware('auth');
Route::post('/product/update', [ProductController::class, 'update'])->middleware('auth');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('/brand', [BrandController::class, 'index'])->middleware('auth');
Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/customer', [AdminController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
