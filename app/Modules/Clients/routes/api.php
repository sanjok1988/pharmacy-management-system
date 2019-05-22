<?php

Route::group(['module' => 'Clients', 'middleware' => ['api'], 'namespace' => 'App\Modules\Clients\Controllers'], function() {

    Route::resource('Clients', 'ClientsController');

});
