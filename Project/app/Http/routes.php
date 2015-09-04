<?php

//Page Linking routes
Route::get('/','PageController@viewIndex');
Route::get('/home','PageController@viewHome');
Route::get('/new/project','PageController@viewAdd');
Route::get('/display','PageController@viewDisplay');
Route::get('/view/project/{id}','PageController@viewProject');
Route::get('/view/project/reserved/{id}','PageController@reserveProject');
Route::get('/view/project/volunteered/{id}','PageController@volunteerProject');
Route::post('/add/project','PageController@addProjects');

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');









