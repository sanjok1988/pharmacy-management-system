<?php

Route::group(['module' => 'Options', 'middleware' => ['api'], 'namespace' => 'App\Modules\Options\Controllers'], function() {

    Route::resource('Options', 'OptionsController');

});
