<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('fire', function () {
    event(new Blog\Events\EventName());
    return 'event fired';
});

Route::get('test', function () {
    return view('test');
});

//Authentication routes
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Password reset link request routes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

//Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', ['as' => 'home', 'uses' => 'PostsController@index']);

    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('users', 'UsersController');

    Route::post('follows', ['as' => 'follow', 'uses' => 'FollowsController@store']);
    Route::delete('follows/{id}', ['as' => 'unfollow', 'uses' => 'FollowsController@destroy']);

    Route::get('profile/{user}/edit', 'UsersController@edit');
    Route::get('notifications/{user}', 'UsersController@getNotifications');
});
