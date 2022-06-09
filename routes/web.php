<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Control_Panel\CategoriesController;
use App\Http\Controllers\Control_Panel\ProductsController;
use App\Http\Controllers\Control_Panel\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Route::resource('auth', AuthenticatedSessionController::class);
Route::resource('register', RegisteredUserController::class);

Route::middleware(['auth'])->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'logout']);

    Route::resource('users', UsersController::class);

    Route::get('/getCategoryProducts/{id}', [CategoriesController::class,'getCategoryProducts'])->name('categories.getCategoryProducts');

    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('ads', \App\Http\Controllers\Control_Panel\AdsController::class);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
