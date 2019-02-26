<?php

Route::group(['prefix'=>'/admin/users','module' => 'Users', 'middleware' => ['web'], 'namespace' => 'App\Modules\Users\Controllers'], function () {
    Route::get('/', 'UsersController@index')->name('indexUser');
    Route::get('create', 'UsersController@create')->name('createUser');
    Route::post('store', 'UsersController@store')->name('storeUser');
    Route::get('edit/{id}', 'UsersController@edit')->name('editUser');
    Route::get('view/{id}', 'UsersController@show')->name('viewUser');
    Route::post('update/{id}', 'UsersController@update')->name('updateUser');
    Route::get('delete/{id}', 'UsersController@destroy')->name('deleteUser');
});
