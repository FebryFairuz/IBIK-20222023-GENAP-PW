<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Orders;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\Products;
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
Route::get('/', [Dashboard::class,'index']);
Route::get('/dashboard', [Dashboard::class,'index'])->name('dashboard')->middleware('auth');

Route::controller(Authentication::class)->group(function () {
    Route::get('/signin', 'index')->name('signin')->middleware('guest');
    Route::post('/signin', 'authenticate')->middleware('guest');
});

Route::get('/signout', [Authentication::class,'signout'])->middleware('auth');

Route::controller(Products::class)->group(function () {
    Route::get('/catalog-product', 'index')->name('catalog-product')->middleware('auth');
    Route::post('/catalog-product', 'store')->name('catalog-product-post')->middleware('auth');
    Route::get('/catalog-product/detail', 'show')->name('catalog-product-detail')->middleware('auth');
});

Route::get('/invoice/{token}', [PaymentsController::class,'invoice'])->middleware('auth');
Route::get('/reporting', [Orders::class,'reporting'])->name('reporting')->middleware('auth');
