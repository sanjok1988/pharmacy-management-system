<?php

Route::group(['prefix'=>'api/roles/', 'module' => 'Roles', 'middleware' => ['api'], 'namespace' => 'App\Modules\Roles\Controllers'], function() {
    Route::get('/', 'RolesController@getData');
    Route::resource('Roles', 'RolesController');

});
