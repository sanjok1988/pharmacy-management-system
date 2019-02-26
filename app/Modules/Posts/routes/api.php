<?php

Route::group(['prefix'=>'api/posts', 'module' => 'Posts', 'middleware' => ['api'], 'namespace' => 'App\Modules\Posts\Controllers\Api'], function () {
    Route::get('/', 'PostsController@getData')->name('posts.data');
    Route::get('/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::post('/update/{id}', 'PostsController@update')->name('posts.update');
    Route::post('/store', 'PostsController@store')->name('posts.store');
    Route::post('/delete/{id}', 'PostsController@destroy')->name('posts.delete');
});
