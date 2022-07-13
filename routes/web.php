<?php

use App\Http\Controllers\Admin\PostCrudController;
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
    return view('team', compact(['team', 'dep', 'roles']));
})->name('equipa');

/* Merch */
Route::get('/merch', function () {
    $merch = DB::table('merch')
        ->get();
    return view('merch', ['merch' => $merch]);
})->name('merch');

/* Product */

Route::get('/merch/product', function () {
    if (!isset($_GET['id'])) {
        return redirect()->route('merch');} else {
        $merch = DB::table('merch')
            ->whereIn('id', [$_GET['id']])
            ->get();};

    return view('product', ['merch' => $merch]);
});

/* Order */
Route::get('/order', function () {
    /* se o tamanho for nulo o valor fica como 0 */
    if (!isset($_GET['size'])) {$_GET['size'] = 0;} else {}
    /* se o valor de iddelete existir, faz delete*/
    if (!isset($_GET['iddelete'])) {} else {
        DB::table('order')
            ->where('id', ($_GET['iddelete']))
            ->delete();
        return redirect('/order');}
    /* se o valor de iddelete existir, faz delete*/
    if (!isset($_GET['id'])) {} else {
        DB::table('order')
            ->insert(array('user' => 1, 'product' => $_GET['id'], 'size' => $_GET['size'], 'quantity' => '1', 'status' => '0'));
        return redirect('/order');}
    $order = DB::table('order')
        ->where('status', '==', 0)
        ->get();
    return view('order', ['order' => $order]);
});

/* FATURA */

/* Route::get('/fatura', function () {
$order = DB::table('order')
->whereIn('user', [Auth::id()])
->where('status', '==', 0)
->get();
DB::table('order')
->where('user', [Auth::id()])
->where('status', '0')
->update(['status' => '1']);
$layout = DB::table('mail')
->where('name', 'fatura')
->get();
\Mail::to(auth()->user()->email)->send(new \App\Mail\fatura($order, $layout));
return redirect()->route('merch');
}); */

/* Post */
Route::get('blog/{post:slug}', [PostCrudController::class, 'showPosts']);

Route::get('/blog', [PostCrudController::class, 'blogPostIndex'])->name('blog');

/* Links */
Route::get('/links', function () {
    $link = DB::table('links')
        ->latest()
        ->get();
    return view('links', ['links' => $link]);
})->name('links');

require __DIR__ . '/auth.php';
