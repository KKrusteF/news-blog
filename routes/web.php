<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserPostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('user/{user}/posts/', [UserPostController::class, 'index'])->middleware('auth');
Route::get('user/posts/create', [UserPostController::class, 'create'])->middleware('auth');
Route::post('user/posts', [UserPostController::class, 'store'])->middleware('auth');
Route::get('user/posts/{post}/edit', [UserPostController::class, 'edit'])->middleware('auth');
Route::patch('user/posts/{post}', [UserPostController::class, 'update'])->middleware('auth');
Route::delete('user/posts/{post}', [UserPostController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
//    Route::get('admin/posts/', [AdminPostController::class, 'index']);
//    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
//    Route::post('admin/posts', [AdminPostController::class, 'store']);
//    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
//    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
//    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});

