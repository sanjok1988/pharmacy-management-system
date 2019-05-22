<?php

Route::group(['prefix'=>'customer','module' => 'Customers', 'middleware' => ['web'], 'namespace' => 'App\Modules\Customers\Controllers'], function() {

    Route::get('login', 'CustomersController@loginPage')->name('customer.login');
    Route::post('login', 'CustomersController@login')->name('customer.login.post');

    Route::get('register', 'CustomersController@registerPage')->name('customer.register');
    Route::post('register', 'CustomersController@register')->name('customer.register.post');

    Route::get('logout', 'CustomersController@logout')->name('customer.logout')->middleware('customer');;

});
