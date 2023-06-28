<?php

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

Route::get('user', [UsersController::class, 'index']);
Route::post('sign-in', [UsersController::class, 'signin'])->middleware(['cors']);
Route::post('user/detail', [UsersController::class, 'detail']);
Route::get('product', [ProductsController::class, 'index']);
Route::post('product', [ProductsController::class, 'stored']);


