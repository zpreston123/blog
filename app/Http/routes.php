<?php

//Welcome route
Route::get('/', 'WelcomeController@index');

//Authentication routes
Auth::routes();

//Profile routes
Route::resource('profile', 'ProfileController');

//Post routes
Route::resource('posts.comments', 'PostCommentController');
Route::get('posts/search', 'PostController@search');
Route::resource('posts', 'PostController');
