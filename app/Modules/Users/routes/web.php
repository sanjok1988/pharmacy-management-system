<?php

Route::group(['prefix'=>'/admin/users','module' => 'Users', 'middleware' => ['web'], 'namespace' => 'App\Modules\Users\Controllers'], function () {
    Route::get('/', 'UsersController@index')->name('user.index');
    Route::get('create', 'UsersController@create')->name('user.create');
    Route::post('store', 'UsersController@store')->name('user.store');
    Route::get('edit/{id}', 'UsersController@edit')->name('user.edit');
    Route::get('view/{id}', 'UsersController@show')->name('user.view');
    Route::post('update/{id}', 'UsersController@update')->name('user.update');
    Route::get('delete/{id}', 'UsersController@destroy')->name('user.delete');
});
