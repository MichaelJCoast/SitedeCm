<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentGroupRolesController;
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
});

Route::get('/team', [TeamController::class, 'index']);
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/studentgrouproles', [StudentGroupRolesController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);
Route::get('blog/{post:slug}', [PostController::class, 'showFullPostBySlug']);

Route::post('/register', [RegisteredUserController::class, 'register']);
Route::post('/login', [RegisteredUserController::class, 'login']);
