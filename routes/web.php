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

Route::view('/', 'welcome')->name('welcome');
Auth::routes(['verify' => true]);
Route::put('profiles/{profile}/avatar', 'ProfileAvatarController@update')->name('profiles.update-avatar');
Route::resource('profiles', 'ProfileController')->only('index', 'show', 'edit', 'update');
Route::get('posts/search', 'PostController@search')->name('posts.search');
Route::resource('posts', 'PostController');
Route::resource('posts.comments', 'PostCommentController')->only('index', 'store', 'destroy');
Route::resource('likes', 'LikeController')->only('index', 'store', 'destroy');
Route::resource('followers', 'FollowerController')->only('index', 'store', 'destroy');
