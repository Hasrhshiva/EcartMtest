<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',  [MainController::class, 'index'])->name('home.page');
Route::get('/cart-list/{id}',[MainController::class, 'cartList'])->name('cart-list');
Route::get('/states',[MainController::class,'states']);

Auth::routes();


Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //products Section
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/add', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

});
  

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
