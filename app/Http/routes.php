<?php

//Welcome route
Route::get('/', 'WelcomeController@index');

//Authentication routes
Auth::routes();

//Profile routes
Route::get('profile', 'ProfileController@edit');
Route::post('profile', 'ProfileController@update');

//Post routes
Route::resource('posts.comments', 'PostCommentController');
Route::get('posts/search', 'PostController@search');
Route::resource('posts', 'PostController');
