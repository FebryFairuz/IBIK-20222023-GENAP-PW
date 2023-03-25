<?php

// use App\Http\Controllers\Dashboard;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\PraktikumDua;
// use App\Http\Controllers\Profiles;
// use App\Http\Controllers\TestController;

use App\Http\Controllers\HomeController;
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

//Format Route menuju langsung ke file layout VIEW
Route::get('/', function () { //=> titik awal dr aplikasi
    return view('welcome');
});

//Format Route menuju class controller
// Route::get('/home', [TestController::class,'home']); //nama class => nama fungsi

// Route::get('/praktikum-2', [PraktikumDua::class,'SoalDua']);
// Route::get('/sample-bootstrap', function () { //=> titik awal dr aplikasi
//     return view('samplebootstrap');
// });
// Route::get('/sample-bootstrap-layout', function () { //=> titik awal dr aplikasi
//     return view('samplebootstrap-layout');
// });

// Route::get('/dashboard', [Dashboard::class,'index']);

// Route::get('/profile', [Profiles::class,'index']);
// Route::get('/profile/detail', [Profiles::class,'detail']);
// Route::get('/profile/info', [Profiles::class,'info']);

Route::get('/home', [HomeController::class,'index']);
Route::get('/chart', [HomeController::class,'chart']);
