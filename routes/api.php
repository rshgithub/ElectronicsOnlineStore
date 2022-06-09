<?php

use App\Http\Controllers\Api\AdsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\Auth\ChangePasswordController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UsersController;
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

// -------------------------------------------------------------------------


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('changePassword', [ChangePasswordController::class, 'changePassword']);

    // ----------------------------------------------------- users -----------------------------------------------------

    Route::delete('AllUsers', [UsersController::class, 'deleteAllUsers']);
    Route::get('UserProfile/{id}', [UsersController::class, 'getUserProfile']);

    Route::get('DeletedUsers', [UsersController::class, 'getDeletedUsers']);
    Route::get('UsersWithDeleted', [UsersController::class, 'getUsersWithDeleted']);
    Route::get('restoreDeletedUser/{id}', [UsersController::class, 'restoreDeletedUser']);

    Route::resource('users', UsersController::class);

    // ------------------------------------------------------ Users ---------------------------------------------------

    Route::resource('home', HomeController::class);

    // ------------------------------------------------------ Products ---------------------------------------------------

    Route::get('searchProduct', [ProductsController::class, 'searchProduct']);
    Route::get('DeletedProducts', [ProductsController::class, 'getDeletedProducts']);
    Route::get('ProductsWithDeleted', [ProductsController::class, 'getProductsWithDeleted']);
    Route::get('restoreDeletedProduct/{id}', [ProductsController::class, 'restoreDeletedProduct']);

    Route::resource('products', ProductsController::class);

    // ------------------------------------------------------ Ads ---------------------------------------------------

    Route::get('AllAds', [AdsController::class, 'getAllAds']);

    Route::resource('ads',AdsController::class);

    // ------------------------------------------------------ Users ---------------------------------------------------

    Route::get('DeletedCategories', [CategoriesController::class, 'getDeletedCategories']);
    Route::get('CategoriesWithDeleted', [CategoriesController::class, 'getCategoriesWithDeleted']);
    Route::get('CategoryProducts/{id}', [CategoriesController::class, 'getCategoryProducts']);
    Route::get('restoreDeletedCategory/{id}', [CategoriesController::class, 'restoreDeletedCategory']);

    Route::resource('categories', CategoriesController::class);

});
