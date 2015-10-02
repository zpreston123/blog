<?php

\Debugbar::disable();

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
    Route::get('home', ['as' => 'home', 'uses' => 'PostController@index']);
    Route::get('profile/{user}/edit', 'UserController@edit');

    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');
    Route::resource('users', 'UserController');
});
