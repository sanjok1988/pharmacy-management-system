<?php

Route::group(['module' => 'Frontend', 'middleware' => ['web'], 'namespace' => 'App\Modules\Frontend\Controllers'], function () {
    Route::get('/', 'FrontendController@home')->name('home');
    Route::get('products', 'FrontendController@getProductList')->name('front.products.list');
    Route::get('product/view', 'FrontendController@view')->name('front.products.view');
    Route::get('products/list', 'FrontendController@getProductData')->name('front.product-data');

    Route::get('contact', 'FrontendController@contact')->name('contact');
});