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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', [PostsController::class, 'index'])->name('posts');
Route::get('posts/{id}', [PostsController::class, 'show'])->name('show');
Route::post('posts', [PostsController::class, 'store'])->name('store');
Route::put('posts/{id}', [PostsController::class, 'update'])->name('update');
Route::delete('posts/{id}', [PostsController::class, 'destroy'])->name('destroy');
