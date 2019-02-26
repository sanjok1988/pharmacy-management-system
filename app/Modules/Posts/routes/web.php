<?php

Route::group(['prefix'=>'/admin/news','module' => 'Posts', 'middleware' => ['web'], 'namespace' => 'App\Modules\Posts\Controllers'], function () {
    Route::get('/', 'NewsController@index')->name('indexNews');;
    Route::get('create', 'NewsController@create')->name('createNews');
    Route::post('create', 'NewsController@store')->name('storeNews');
    Route::get('/edit/{id}', 'NewsController@edit')->name('editNews');
    Route::get('/view/{id}', 'NewsController@show')->name('viewNews');
    Route::post('update/{id}', 'NewsController@update')->name('updateNews');
    Route::get('delete/{id}', 'NewsController@delete')->name('deleteNews');

    
});
