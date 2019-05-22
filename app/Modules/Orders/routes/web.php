<?php

Route::group(['module' => 'Orders', 'middleware' => ['web'], 'namespace' => 'App\Modules\Orders\Controllers'], function() {

    

    Route::post('upload', 'OrdersController@uploadPrescription')->name('upload')->middleware('customer');
    Route::get('upload', 'OrdersController@getUploadPage')->name('upload.pres')->middleware('customer');

    Route::get('order/history', 'OrdersController@getOrderHistory')->name('order.history')->middleware('customer');

});

Route::group(['prefix'=>'admin/orders','module' => 'Orders', 'middleware' => ['web'], 'namespace' => 'App\Modules\Orders\Controllers'], function() {

    Route::get('/', 'OrdersController@index')->name('order.index')->middleware('auth');
    Route::get('closed', 'OrdersController@closeOrder')->name('orders.closed')->middleware('auth');   

});