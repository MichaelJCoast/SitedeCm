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
    return view('team',compact(['team' ,'dep','roles']));
})->name('equipa');

/* Merch */
Route::get('/merch', function () {
    $merch = DB::table('merch')
    ->get();
    return view('merch', ['merch' => $merch]);
    })->name('merch');;


/* Product */

Route::get('/merch/product', function () {
    if(!isset($_GET['id'])){ 
    return redirect()->route('merch'); } else{ 
    $merch = DB::table('merch')
    ->whereIn('id', [$_GET['id']])
    ->get();  }

    return view('product', ['merch' => $merch]);
    })->middleware(['auth', 'verified']);



    /* Order */
    Route::get('/order', function () {
        if(!isset($_GET['iddelete'])){ }
        else{
            DB::table('order')->where('id', ($_GET['iddelete']))->delete(); }

        $user = Auth::user();
            if(!isset($user->id)){
                return redirect()->route('merch'); };

            if(!isset($_GET['id'])){ }

            else{
            DB::table('order')->insert(array('user'=> Auth::id(),'product'=> $_GET['id'],'size'=> $_GET['size'],'quantity'=>'1','status'=>'0',)); }
        
        $order = DB::table('order')
            ->whereIn('user',  [Auth::id()] )
            ->where('status','==', 0)
            ->get();
            return view('order',['order' => $order] );
            });


    /* FATURA */
        Route::get('/fatura', function () {    

                 DB::table('mail')
                    ->where('name', 'promocao' )
                    ->get();
            \Mail::to( auth()->user()->email )->send(new \App\Mail\fatura($order, $layout));
            return redirect()->route('merch');
        });

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        $user = DB::table('users')
        ->get();
        return view('dashboard',['user' => $user]);
    })->name('dashboard');

    Route::put('dashboard', [\App\Http\Controllers\ProfileController::class, 'update'])
    ->name('dashboard.update');

    Route::view('pedidos', 'orders.index')->name('orders');
});



    /* FATURA */
    Route::get('/mail', function () {    
        $count=0;
        $mail=DB::table('mail')
        ->get();

        if(!isset($_GET['id'])){        
            $main=DB::table('mail')
                    ->get(); } 
        else{ 

        $main=DB::table('mail')
        ->where('id', $_GET['id'] )
           ->get();

           $user = DB::table('users')
           ->get();

           foreach($user as $user){
        \Mail::to( $user->email )->send(new \App\Mail\main($main)); 
        $count+=1;
    }
    dd("Email Enviado para $count pessoas");
    }

  return view('mail', ['mail' => $mail]);
})->middleware('auth');



require __DIR__.'/auth.php';
