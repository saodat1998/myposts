<?php

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
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\CategoriesController;

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [PassportAuthController::class, 'userInfo']);

    //posts
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('posts');
        Route::get('/{id}', [PostsController::class, 'show'])->name('show');
        Route::post('/', [PostsController::class, 'store'])->name('store');
        Route::put('/{id}', [PostsController::class, 'update'])->name('update');
        Route::delete('/{id}', [PostsController::class, 'destroy'])->name('destroy');
    });

    //categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('categories');
        Route::get('/{id}', [CategoriesController::class, 'show'])->name('show');
        Route::post('/', [CategoriesController::class, 'store'])->name('store');
        Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
    });

});
