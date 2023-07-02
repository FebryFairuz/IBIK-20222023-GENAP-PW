<?php

use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
header('Access-Control-Allow-Headers: Accept, Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('students', function(){
//     return 'this is a student';
// });

//access : localhost:8000/api/name-route
Route::get('pwl',function(){
    return "this is an api";
});

Route::group(['middleware' => 'cors'], function () {
    Route::get('user', [UsersController::class, 'index']);
    Route::post('sign-in', [UsersController::class, 'signin']);
    Route::post('user/detail', [UsersController::class, 'detail']);

    Route::get('product', [ProductsController::class, 'index']);
    Route::post('product', [ProductsController::class, 'stored']);
    Route::get('product/detail/{id}', [ProductsController::class, 'detail']);
    Route::get('product/remove/{id}', [ProductsController::class, 'destroy']);

    Route::post('order', [OrdersController::class, 'stored']);
    Route::get('all-invoice', [OrdersController::class, 'allinvoice']);
    Route::get('invoice/{code}', [OrdersController::class, 'invoice']);
});
