<?php

Route::group(['prefix'=>'api/users', 'module' => 'Users', 'middleware' => ['api'], 'namespace' => 'App\Modules\Users\Controllers'], function () {
    Route::get('/', 'UsersController@getData');
    Route::post('/store', 'UsersController@store');
    Route::get('edit/{id}', 'UsersController@edit');   
    Route::post('update/{id}', 'UsersController@update');
    Route::post('delete/{id}', 'UsersController@destroy');
});
