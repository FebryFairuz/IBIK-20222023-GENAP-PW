<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', ['as'=>'login', 'uses'=>'LoginController@submit']);

Route::get('/home', [HomeController::class,'index']);

Route::controller(ProductsController::class)->group(function () {
    Route::get('/master-data/products', 'index')->name('m_products');
    Route::post('/master-data/products', 'store');
    Route::get('/master-data/products/{id}', 'show')->name('m_products_detail');
    Route::get('/master-data/products/edit/{id}', 'edit')->name('m_products_edit');
    Route::get('/master-data/products/remove/{id}', 'destroy')->name('m_products_remove');
});
Route::get('/master-data/users', function(){
    return view('modules.master-data.users.user');
});
