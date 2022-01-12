<?php

use App\Http\Controllers\BookmarkPostController;
use App\Http\Controllers\BookmarkProcessController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UnreadPostController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'view'])->name('login');
    Route::post('/login', [LoginController::class, 'login_process'])->name('login_process');

    // Register
    Route::get('/register', [RegisterController::class, 'view'])->name('register');
    Route::post('/register', [RegisterController::class, 'register_process'])->name('register_process');
});

Route::middleware('auth')->group(function () {
    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout_process');

    // Forum
    Route::get('/course/{courses_id}', [CourseController::class, 'view'])->name('course');

    // Post
    Route::get('/post/{posts_id}', [PostController::class, 'view'])->name('post');

    // Unread Post
    Route::get('/unread_post', [UnreadPostController::class, 'view'])->name('unread');

    // Bookmark Post
    Route::get('/bookmark_post', [BookmarkPostController::class, 'view'])->name('bookmark');

    // Create Post
    Route::get('/create_post', [CreatePostController::class, 'view'])->name('create_post');
    Route::post('/send_post/{user_id}', [CreatePostController::class, 'create'])->name('send_post');

    // Reply Post
    Route::get('/reply/{posts_id}', [ReplyController::class, 'view'])->name('reply');

    // Bookmark Process
    Route::get('/bookmark_process/{posts_id}', [BookmarkProcessController::class, 'bookmark_process'])->name('bookmark_process');
});

// Home
Route::get('/', [HomeController::class, 'view'])->name('home');

