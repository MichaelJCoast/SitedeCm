<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('link', 'LinkCrudController');
    Route::crud('merch', 'MerchCrudController');
    Route::crud('department', 'DepartmentCrudController');
    Route::crud('cargo', 'CargoCrudController');
    Route::crud('equipa', 'EquipaCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('about', 'AboutCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('categoria', 'CategoriaCrudController');
    Route::crud('mandato', 'MandatoCrudController');
    Route::crud('status', 'StatusCrudController');
    Route::crud('size', 'SizeCrudController');
    Route::crud('carousel', 'CarouselCrudController');
    Route::crud('log-activity', 'UserActivityCrudController');
    Route::crud('about-image', 'AboutImageCrudController');
}); // this should be the absolute last line of this file