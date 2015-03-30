<?php

Route::get('/{date?}', 'PagesController@index');

/**
 * Authentication
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
