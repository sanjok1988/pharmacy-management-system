<?php

Route::group(['module' => 'Frontend', 'middleware' => ['web'], 'namespace' => 'App\Modules\Frontend\Controllers'], function () {
    Route::get('products', 'FrontendController@getProductList')->name('front.products');
    Route::get('products/list', 'FrontendController@getProductData')->name('front.product-data');
});
