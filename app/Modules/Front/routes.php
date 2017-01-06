<?php

// Evaluation management
$baseModule = '\App\Modules\Front\Controllers';

Route::group(['prefix' => '/'], function() use ($baseModule) {
    Route::get('/', "$baseModule\HomeController@index");
    Route::get('/about', function() {
        return view('Front::about');
    });
});
