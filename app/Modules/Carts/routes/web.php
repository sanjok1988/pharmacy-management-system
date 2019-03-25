<?php

Route::group(['module' => 'Carts', 'middleware' => ['web'], 'namespace' => 'App\Modules\Carts\Controllers'], function () {
    Route::any('add/to/cart', 'CartsController@addToCart')->name('add.to.cart');
    Route::get('cart', 'CartsController@cart')->name('cart.list');
    Route::get('cart/data', 'CartsController@getCartList')->name('cart.data');
});
