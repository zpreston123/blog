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

Auth::routes();

Route::get('profiles', 'ProfileController@index')->name('profiles.index');
Route::get('profiles/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('profiles/{user}', 'ProfileController@update')->name('profiles.update');

Route::put('profiles/{user}/avatar', 'ProfileAvatarController@update')->name('profiles.update-avatar');

Route::get('posts/search', 'PostController@search')->name('posts.search');
Route::resource('posts', 'PostController');

Route::get('posts/{post}/comments', 'PostCommentController@index')->name('post-comments.index');
Route::post('posts/{post}/comments', 'PostCommentController@store')->name('post-comments.store');
Route::delete('posts/{post}/comments/{comment}', 'PostCommentController@destroy')->name('post-comments.destroy');

Route::get('favorites', 'FavoriteController@index')->name('favorites.index');
Route::post('favorites', 'FavoriteController@store')->name('favorites.store');
Route::delete('favorites/{favorite}', 'FavoriteController@destroy')->name('favorites.destroy');

Route::get('followers', 'FollowerController@index')->name('followers.index');
Route::post('followers', 'FollowerController@store')->name('followers.store');
Route::delete('followers/{follower}', 'FollowerController@destroy')->name('followers.destroy');
