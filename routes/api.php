<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('changePassword', [AuthController::class, 'changePassword']);

    // ----------------------------------------------------- users -----------------------------------------------------

    Route::delete('AllUsers', [UsersController::class, 'deleteAllUsers']);
    Route::get('UserProfile/{id}', [UsersController::class, 'getUserProfile']);

    Route::resource('users', UsersController::class);

    Route::apiResource('home', HomeController::class);
    Route::resource('products',ProductsController::class);
    Route::resource('categories', CategoriesController::class);

});
