<?php

Route::group(['module' => 'Carts', 'middleware' => ['web'], 'namespace' => 'App\Modules\Carts\Controllers'], function () {
    Route::any('add/to/cart', 'CartsController@addToCart')->name('add.to.cart');
    Route::get('cart', 'CartsController@cart')->name('cart.list');
    Route::get('cart/data', 'CartsController@getCartList')->name('cart.data');

    Route::get('cart/total', 'CartsController@getGrandTotal')->name('cart.total');

    Route::get('cart/remove', 'CartsController@remove')->name('cart.remove');
    Route::get('cart/checkout', 'CartsController@checkout')->name('cart.checkout')->middleware('customer');
});
