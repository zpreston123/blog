<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Auth::routes();

Route::put('profiles/{user}/avatar', 'ProfileAvatarController@update')->name('profiles.update-avatar');

Route::get('profiles/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('profiles/{user}', 'ProfileController@update')->name('profiles.update');

Route::get('users/search', 'UserController@search');
Route::get('my_favorites', 'UserController@myFavorites');

Route::get('posts/search', 'PostController@search');
Route::resource('posts', 'PostController');

Route::get('posts/{post}/comments', 'PostCommentController@index');
Route::post('posts/{post}/comments', 'PostCommentController@store');
Route::delete('posts/{post}/comments/{comment}', 'PostCommentController@destroy');

Route::post('favorite/{post}', 'PostController@favoritePost');
Route::post('unfavorite/{post}', 'PostController@unFavoritePost');

Route::get('follow', 'FollowerController@index');
Route::post('follow/{id}', 'FollowerController@store');
Route::delete('unfollow/{id}', 'FollowerController@destroy');
