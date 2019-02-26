<?php

Route::group(['prefix'=>'api/category', 'module' => 'Category', 'middleware' => ['api'], 'namespace' => 'App\Modules\Category\Controllers\Api'], function () {
    Route::get('/', 'CategoryController@getData')->name('category.data');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::post('/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    Route::get('/list', 'CategoryController@getCategory')->name('category.list');
});
