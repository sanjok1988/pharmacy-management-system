<?php

Route::group(['module' => 'Options', 'middleware' => ['web'], 'namespace' => 'App\Modules\Options\Controllers'], function() {

    Route::resource('Options', 'OptionsController');

});
