<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::resource('register', RegisteredUserController::class);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('changePassword', [AuthController::class, 'changePassword']);

    // ----------------------------------------------------- users -----------------------------------------------------

    Route::delete('AllUsers', [UsersController::class, 'deleteAllUsers']);
    Route::get('UserProfile/{id}', [UsersController::class, 'getUserProfile']);

    Route::get('getDeletedUsers', [UsersController::class, 'getDeletedUsers']);
    Route::get('getUsersWithDeleted', [UsersController::class, 'getUsersWithDeleted']);
    Route::get('restoreDeletedUser/{id}', [UsersController::class, 'restoreDeletedUser']);

    Route::resource('users', UsersController::class);

    // ------------------------------------------------------ Users ---------------------------------------------------

    Route::apiResource('home', HomeController::class);

    // ------------------------------------------------------ Users ---------------------------------------------------

    Route::get('getDeletedProducts', [ProductsController::class, 'getDeletedProducts']);
    Route::get('getProductsWithDeleted', [ProductsController::class, 'getProductsWithDeleted']);
    Route::get('restoreDeletedProduct/{id}', [ProductsController::class, 'restoreDeletedProduct']);

    Route::resource('products',ProductsController::class);

    // ------------------------------------------------------ Users ---------------------------------------------------

    Route::get('getDeletedCategories', [CategoriesController::class, 'getDeletedCategories']);
    Route::get('getCategoriesWithDeleted', [CategoriesController::class, 'getCategoriesWithDeleted']);
    Route::get('getCategoryProducts/{id}', [CategoriesController::class, 'getCategoryProducts']);
    Route::get('restoreDeletedCategory/{id}', [CategoriesController::class, 'restoreDeletedCategory']);

    Route::resource('categories', CategoriesController::class);

});
