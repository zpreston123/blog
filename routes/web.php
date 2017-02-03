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
Route::resource('posts.comments', 'CommentController');
Route::get('posts/search', 'PostController@search');
Route::resource('posts', 'PostController');

