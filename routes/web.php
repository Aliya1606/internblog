<?php

use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('blogs', BlogController::class);

    //blog routes
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    //post routes
    Route::get('blogs/{blog}/posts', [PostController::class, 'index'])->name('blogs.posts.index');
    Route::get('blogs/{blog}/posts/create', [PostController::class, 'create'])->name('blogs.posts.create');
    Route::post('blogs/{blog}/posts', [PostController::class, 'store'])->name('blogs.posts.store');
    Route::get('blogs/{blog}/posts/{post}', [PostController::class, 'show'])->name('blogs.posts.show');
    Route::get('blogs/{blog}/posts/{post}/edit', [PostController::class, 'edit'])->name('blogs.posts.edit');
    Route::put('blogs/{blog}/posts/{post}', [PostController::class, 'update'])->name('blogs.posts.update');
    Route::delete('blogs/{blog}/posts/{post}', [PostController::class, 'destroy'])->name('blogs.posts.destroy');

    //tag
    Route::get('blogs/{blog}/posts/{post}/tags', [TagController::class, 'index'])->name('blogs.posts.tags.index');
    Route::get('blogs/{blog}/posts/{post}/tags/create', [TagController::class, 'create'])->name('blogs.posts.tags.create');
    Route::post('blogs/{blog}/posts/{post}/tags', [TagController::class, 'store'])->name('blogs.posts.tags.store');
    Route::get('blogs/{blog}/posts/{post}/tags/{tag}', [TagController::class, 'show'])->name('blogs.posts.tags.show');
    Route::get('blogs/{blog}/posts/{post}/tags/{tag}/edit', [TagController::class, 'edit'])->name('blogs.posts.tags.edit');
    Route::put('blogs/{blog}/posts/{post}/tags/{tag}', [TagController::class, 'update'])->name('blogs.posts.tags.update');
    Route::delete('blogs/{blog}/posts/{post}/tags/{tag}', [TagController::class, 'destroy'])->name('blogs.posts.tags.destroy');
});
