<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\MandatoController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentGroupRolesController;
use App\Http\Controllers\TeamController;
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

Route::post('/order', [OrderController::class, 'submitOrder']);

Route::get('/team', [TeamController::class, 'index']);
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/mandato', [MandatoController::class, 'index']);
Route::get('/studentgrouproles', [StudentGroupRolesController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/faq', [QuestionController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

Route::get('/links', [LinksController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);
Route::get('blog/{post:slug}', [PostController::class, 'showFullPostBySlug']);

Route::get('/merch', [MerchController::class, 'getMerch']);

Route::get('merch/{product:id}', [MerchController::class, 'getProduct']);
Route::get('/categories', [CategoryController::class, 'index']);
