<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Sales management
Route::group(['prefix' => 'sales'], function() {
    Route::get('/', 'SalesController@index');
});

// Users management
Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'UsersController@index');
});

// Users management
Route::group(['prefix' => 'settings'], function() {
    Route::get('/', 'SettingsController@index');
});

Route::auth();

Route::get('/home', '\App\Modules\Front\Controllers\HomeController@index');

Route::get('/product', 'DimasController@index');
