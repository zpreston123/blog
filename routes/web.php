<?php

use App\Http\Controllers\{PostCommentController, PostController, ProfileAvatarController, ProfileController};
use Illuminate\Support\Facades\{Auth, Route};

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
