<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Route::group(['middleware' => ['auth', 'admin']], function () {

Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
//});


//Route::group(['middleware' => ['auth', 'customer']], function () {

// Route::get('admin', 'adminController@adminDashboard');
Route::get('/home', [CustomerHomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class);
//Route::resource('review', ReviewController::class);
Route::get('/reviews/{product_id}', [ReviewController::class, 'index'])->name('view.review');
Route::get('/products/{id}/reviews', [ReviewController::class, 'create'])->name('add.review');
Route::post('/products/{id}/reviews', [ReviewController::class, 'store'])->name('store.review');
//});
