<?php

Route::group(['module' => 'Orders', 'middleware' => ['web'], 'namespace' => 'App\Modules\Orders\Controllers'], function() {

    Route::resource('Orders', 'OrdersController');

});
