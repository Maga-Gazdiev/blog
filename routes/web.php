<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [PostController::class, 'index'])->name('posts');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [OfficeController::class, 'index'])->name('user.index');
    Route::get('/posts/like', [OfficeController::class, 'postsLike'])->name('user.posts.like');
    Route::get('/posts', [OfficeController::class, 'posts'])->name('user.posts');
});

Route::prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
});

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});


Route::post('/like/{post}', [LikeController::class, 'like'])->name('like')->middleware('auth');
Route::post('/unlike/{post}', [LikeController::class, 'unlike'])->name('unlike')->middleware('auth');
Route::post('/like/comment/{post}', [LikeController::class, 'likeComment'])->name('likeComment')->middleware('auth');
Route::post('/unlike/comment/{post}', [LikeController::class, 'unlikeComment'])->name('unlikeComment')->middleware('auth');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
