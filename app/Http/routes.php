<?php

//Welcome route
Route::get('/', 'WelcomeController@index');

//Authentication routes
Auth::routes();

//Profile routes
Route::get('profile', 'ProfileController@edit');
Route::post('profile', 'ProfileController@update');

//User routes
Route::get('users', 'UserController@index');

//Post routes
Route::get('posts/{id}/comments', 'PostController@getComments');
Route::get('posts/search', 'PostController@search');
Route::resource('posts', 'PostController');

//Comment route
Route::post('comments/{post}', 'CommentController@store');
