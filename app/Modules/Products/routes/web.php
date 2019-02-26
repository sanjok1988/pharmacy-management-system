<?php

Route::group(['prefix'=>'admin/products', 'module' => 'Products', 'middleware' => ['web'], 'namespace' => 'App\Modules\Products\Controllers'], function () {
    Route::get('/', 'ProductsController@index')->name('product.index');
    Route::get('create', 'ProductsController@create')->name('product.create');
    Route::get('edit/{id}', 'ProductsController@create')->name('product.edit');
    Route::post('store', 'ProductsController@store')->name('product.store');
    Route::get('delete/{id}', 'ProductsController@destroy')->name('product.delete');
});
