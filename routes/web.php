<?php

use Illuminate\Support\Facades\Route;

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
Route::get('profiles/{profile}/follow', 'ProfileController@follow');
Route::get('profiles/{profile}/unfollow', 'ProfileController@unfollow');
Route::put('profiles/{profile}/avatar', 'ProfileAvatarController@update')->name('profiles.update-avatar');
Route::resource('profiles', 'ProfileController')->only('index', 'show', 'edit', 'update');
Route::get('posts/search', 'PostController@search')->name('posts.search');
Route::get('posts/{post}/like', 'PostController@like');
Route::get('posts/{post}/unlike', 'PostController@unlike');
Route::resource('posts', 'PostController');
Route::resource('posts.comments', 'PostCommentController')->only('index', 'store', 'destroy');
