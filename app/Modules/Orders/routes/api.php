<?php

Route::group(['module' => 'Orders', 'middleware' => ['api'], 'namespace' => 'App\Modules\Orders\Controllers'], function() {

    Route::resource('Orders', 'OrdersController');

});
