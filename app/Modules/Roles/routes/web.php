<?php

Route::group(['prefix'=>'admin/roles','module' => 'Roles', 'middleware' => ['web'], 'namespace' => 'App\Modules\Roles\Controllers'], function () {
    Route::get('/', 'RolesController@index')->name('role.index');
    Route::get('create', 'RolesController@create')->name('role.create');
    Route::get('edit/{id}', 'RolesController@edit')->name('role.edit');
    Route::post('store', 'RolesController@store')->name('role.store');
    Route::get('delete/{id}', 'RolesController@destroy')->name('role.delete');
});
