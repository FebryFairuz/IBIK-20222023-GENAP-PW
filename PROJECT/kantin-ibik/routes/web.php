<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard;
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
Route::get('/', [Dashboard::class,'index'])->middleware('auth');
Route::get('/dashboard', [Dashboard::class,'index'])->middleware('auth');

Route::controller(Authentication::class)->group(function () {
    Route::get('/signin', 'index')->name('signin')->middleware('guest');
    Route::post('/signin', 'authenticate')->middleware('guest');
});

Route::get('/signout', [Authentication::class,'signout'])->middleware('auth');
