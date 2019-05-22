<?php
Route::group(['prefix' =>'admin/category','module' => 'Category', 'middleware' => ['web'], 'namespace' => 'App\Modules\Category\Controllers'], function () {
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('view/{id}', 'CategoryController@edit')->name('category.view');
    
    Route::post('store', 'CategoryController@store')->name('category.store');
    Route::get('delete/{id}', 'CategoryController@destroy')->name('category.delete');
});
