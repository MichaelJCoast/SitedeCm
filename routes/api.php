<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [RegisteredUserController::class, 'logout']);
    Route::resource('/blog', \App\Http\Controllers\Admin\PostCrudController::class);
});

//Route::get('/blog', [PostCrudController::class, 'blogPostIndex'])->name('blog');

Route::post('/register', [RegisteredUserController::class, 'register']);
Route::post('/login', [RegisteredUserController::class, 'login']);