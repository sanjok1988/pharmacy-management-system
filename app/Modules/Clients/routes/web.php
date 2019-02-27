<?php

Route::group(['module' => 'Clients', 'middleware' => ['web'], 'namespace' => 'App\Modules\Clients\Controllers'], function() {

    Route::resource('Clients', 'ClientsController');

});
