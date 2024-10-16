<?php

/*
|--------------------------------------------------------------------------
| Backpack\LogUserActivity Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\LogUserActivity package.
|
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin',  
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
], function () {
    Route::crud('log-activity', 'UserActivityCrudController');
});
