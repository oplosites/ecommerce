<?php

// Evaluation management
$baseModule = '\App\Modules\Products\Controllers';

Route::group(['prefix' => '/home'], function() use ($baseModule) {
    Route::get('/', "$baseModule\HomeController@index");
});
