<?php

// Evaluation management
$baseModule = '\App\Modules\Admin\Controllers';

Route::group(['prefix' => '/admin'], function() use ($baseModule) {
    Route::get('/', "$baseModule\HomeController@index");

    Route::get('/about', function() {
        return view('Front::static/about');
    });

    Route::get('/contact', function() {
        return view('Front::static/contact');
    });

    Route::post('/contact', "$baseModule\HomeController@contact");

    Route::get('/appointment', "$baseModule\HomeController@appointment");

    Route::post('/appointment', "$baseModule\HomeController@createAppointment");
});
