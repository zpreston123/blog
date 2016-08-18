<?php

//Welcome route
Route::get('/', 'WelcomeController@index');

//Authentication routes
Route::auth();

//Home route
Route::get('home', ['as' => 'home', 'uses' => 'PostController@index']);

//Profile routes
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@updateAvatar');

//Post routes
Route::post('posts/{post}/comment', 'PostController@postComment');
Route::resource('posts', 'PostController');

//User routes
Route::resource('users', 'UserController');
