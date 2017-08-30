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

//Welcome route
Route::get('/', 'WelcomeController@index');

//Authentication routes
Auth::routes();

//Profile routes
Route::resource('profile', 'ProfileController');

//Post routes
Route::get('posts/search', 'PostController@search');
Route::resource('posts', 'PostController');

//Post comment routes
Route::get('posts/{post}/comments', 'PostCommentController@index');
Route::post('posts/{post}/comments', 'PostCommentController@store');
Route::delete('posts/{post}/comments/{comment}', 'PostCommentController@destroy');

Route::post('favorite/{post}', 'PostController@favoritePost');
Route::post('unfavorite/{post}', 'PostController@unFavoritePost');

Route::get('users/search', 'UserController@search');
Route::get('my_favorites', 'UserController@myFavorites');

Route::get('follow', 'FollowerController@index');
Route::post('follow/{id}', 'FollowerController@store');
Route::delete('unfollow/{id}', 'FollowerController@destroy');
