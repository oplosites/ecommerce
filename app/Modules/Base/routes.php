<?php

// Evaluation management
$baseModule = '\App\Modules\Base\Controllers';

Route::group(['prefix' => '/settings'], function() use ($baseModule) {
    Route::get('/', "$baseModule\SettingsController@index");
    Route::post('/slider', "$baseModule\SettingsController@sliderUpload");
});
