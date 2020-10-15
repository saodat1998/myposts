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
    Route::get('posts', [PostsController::class, 'index'])->name('posts');
    Route::get('posts/{title}', [PostsController::class, 'show'])->name('show');
    Route::post('posts', [PostsController::class, 'store'])->name('store');
    Route::put('posts/{id}', [PostsController::class, 'update'])->name('update');
    Route::delete('posts/{id}', [PostsController::class, 'destroy'])->name('destroy');

    //categories
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('categories/{name}', [CategoriesController::class, 'show'])->name('show');
    Route::post('categories', [CategoriesController::class, 'store'])->name('store');
    Route::put('categories/{id}', [CategoriesController::class, 'update'])->name('update');
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy'])->name('destroy');

});






// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);
