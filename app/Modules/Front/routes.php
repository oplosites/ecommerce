<?php

// Evaluation management
$baseModule = '\App\Modules\Front\Controllers';

Route::group(['prefix' => '/'], function() use ($baseModule) {
    Route::get('/', "$baseModule\HomeController@index");

    Route::get('/about', function() {
        return view('Front::static/about');
    });

    Route::get('/contact', function() {
        return view('Front::static/contact');
    });

    Route::post('/contact', "$baseModule\HomeController@contact");

    Route::get('/appointment', "$baseModule\HomeController@appointment");
});
