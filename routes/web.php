<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\ProfileAvatarController;
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
Route::get('profiles/{profile}/follow', [ProfileController::class, 'follow']);
Route::get('profiles/{profile}/unfollow', [ProfileController::class, 'unfollow']);
Route::put('profiles/{profile}/avatar', [ProfileAvatarController::class, 'update'])->name('profiles.update-avatar');
Route::resource('profiles', ProfileController::class)->only('index', 'show', 'edit', 'update');
Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');
Route::get('posts/{post}/like', [PostController::class, 'like']);
Route::get('posts/{post}/unlike', [PostController::class, 'unlike']);
Route::resource('posts', PostController::class);
Route::resource('posts.comments', PostCommentController::class)->only('index', 'store', 'destroy');
