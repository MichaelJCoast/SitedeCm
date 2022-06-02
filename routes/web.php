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
    ->orderBy('created_at', 'desc')
    ->take(6)
    ->get();
    
    return view('index', ['posts' => $post]);
});

/* Equipa */
Route::get('/equipa', function () {
    $team = DB::table('equipa')
    ->orderBy('dep_id', 'ASC')
    ->get();
    $dep = DB::table('departments')
    ->orderBy('id', 'ASC')
    ->get();
    $roles = DB::table('cargos')
    ->orderBy('id', 'ASC')
    ->get();
    return view('member',compact(['team' ,'dep','roles']));
})->name('equipa');

/* Merch */
Route::get('/merch', function () {
    $merch = DB::table('merch')
    ->get();
    return view('merch', ['merch' => $merch]);
    })->name('merch');;

/* Product */
Route::get('/merch/product', function () {
    $merch = DB::table('merch')
    ->whereIn('id', [$_GET['id']])
    ->get();
    return view('product', ['merch' => $merch]);
    });

/* Post */
Route::get('blog/{post:slug}', [PostCrudController::class, 'showPosts']);

/* Links */
Route::get('/links', function () {
    $link = DB::table('links')
    ->latest()
    ->get();
    return view('links', ['links' => $link]);
    })->name('links');;

Route::get('/dashboard', function () {
    $user = DB::table('users')
    ->get();
    return view('dashboard',['user' => $user]);
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
