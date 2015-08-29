<?php

Route::get('/','PageController@viewIndex');
Route::get('/home','PageController@viewHome');
Route::get('/add','PageController@viewAdd');
Route::get('/display','PageController@viewDisplay');
Route::get('/displayAll','PageController@viewDisplayAll');
Route::get('/project','PageController@viewProject');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');









