<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostCrudController;

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

/* Main Page */
Route::get('/', function () {
    $post = DB::table('posts')
    ->orderBy('published_at', 'desc')
    ->take(5)
    ->get();
    return view('index', ['post' => $post]);
});

/* Equipa */
Route::get('/equipa', function () {
    $team = DB::table('equipa')
    ->orderBy('dep_id', 'ASC')
    ->get();
    $dep = DB::table('departments')
    ->orderBy('id', 'ASC')
    ->get();
    return view('member',compact(['team' ,'dep']));
});

/* Merch */
Route::get('/merch', function () {
    $merch = DB::table('merch')
    ->get();
    return view('merch', ['merch' => $merch]);
    });

/* Product */
Route::get('/merch/product', function () {
    $merch = DB::table('merch')
    ->whereIn('id', [$_GET['id']])
    ->get();
    return view('product', ['merch' => $merch]);
    });

/* Post */
Route::get('blog/{post:slug}', [PostCrudController::class, 'show']);

/* Links */
Route::get('/links', function () {
    $link = DB::table('links')
    ->latest()
    ->get();
    return view('links', ['link' => $link]);
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
