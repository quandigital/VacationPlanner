<?php

Route::get ('/{date?}', 'PagesController@index');
Route::post ('/store', 'PagesController@store');
Route::post ('/destroy', 'PagesController@destroy');

/**
 * Authentication
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
