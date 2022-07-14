<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentGroupRolesController;
use App\Http\Controllers\TeamController;
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
    Route::put('/update-profile', [ProfileController::class, 'update']);
    Route::post('/logout', [RegisteredUserController::class, 'logout']);
});

Route::get('/', [TeamController::class, 'index']);

Route::get('/team', [TeamController::class, 'index']);
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/studentgrouproles', [StudentGroupRolesController::class, 'index']);

Route::get('/links', [LinksController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);
Route::get('blog/{post:slug}', [PostController::class, 'showFullPostBySlug']);
