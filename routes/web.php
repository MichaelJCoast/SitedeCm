<?php

use Illuminate\Support\Facades\Route;

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
    $post = DB::table('posts')->get();
    return view('index', ['post' => $post]);
});

/* Equipa */
Route::get('/equipa', function () {
    $team = DB::table('members')->get();
    return view('member',['team' => $team]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/merch', function () {
    return view('merch');
    });

Route::get('/links', function () {
    return view('links');
    });