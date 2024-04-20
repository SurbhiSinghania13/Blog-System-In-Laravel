<?php

use App\Http\Controllers\ProfileController;
use app\Models\BlogPost;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses'=>"App\Http\Controllers\BlogPostController@index",
    'as'=>'blog_posts'
])->middleware(['auth', 'verified'])->name('blog_posts');;

Route::get('/blog_posts', [
    'uses'=>"App\Http\Controllers\BlogPostController@index",
    'as'=>'blog_posts'
]);

Route::get('/post/{post_id}/edit', [
    BlogPostController::class, 'edit'])->name('post.edit');

Route::post('/post/{post_id}', [
    BlogPostController::class, 'destroy'
])->name('post.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [BlogPostController::class, 'create'])->name('post.create');
    Route::post('/posts', [BlogPostController::class, 'store'])->name('post.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
