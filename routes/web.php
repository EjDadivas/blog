<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

// POSTS
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show']);

// COMMENTS
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
// this is a single action controller, u see its not an array. go check it
Route::post('newsletter', NewsletterController::class);

// REGISTER
// Only guest is signed in here
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// LOGIN AND LOGOUT
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// ADMIN
Route::post('/admin/posts/', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');

Route::get('/admin/posts/', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('/admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('/admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('/admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin');

