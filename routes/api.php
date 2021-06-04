<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

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
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    Route::group(['middleware' => ['role:Root']], function () {
    });
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'getPosts'])->name('posts.get');
});

Route::post('/posts', [App\Http\Controllers\PostController::class, 'createPosts'])->name('posts.create');
Route::delete('/posts', [App\Http\Controllers\PostController::class, 'deletePosts'])->name('posts.destroy');