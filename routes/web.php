<?php

use App\Helpers\Telegram;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OtherController;
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
    Route::get('/likedComment', [OfficeController::class, 'likedComment'])->name('user.likedComment');
    Route::get('/comment', [OfficeController::class, 'comment'])->name('user.comment');
});

Route::prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
});

Route::prefix('comments')->group(function () {
    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/like/{post}', [LikeController::class, 'like'])->name('like');
    Route::post('/unlike/{post}', [LikeController::class, 'unlike'])->name('unlike');
    Route::post('/like/comment/{post}', [LikeController::class, 'likeComment'])->name('like.comment');
    Route::post('/unlike/comment/{post}', [LikeController::class, 'unlikeComment'])->name('unlike.comment');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::prefix('other')->group(function () {
    Route::get('/', [OtherController::class, 'index'])->name('other');
    Route::get('/bored', [OtherController::class, 'bored'])->name('other.bored');
    Route::get('/ipify', [OtherController::class, 'ipify'])->name('other.ipify');
    Route::post('/predict', [OtherController::class, 'national'])->name('other.national');
    Route::post('/ipinfo', [OtherController::class, 'ipinfo'])->name('other.ipinfo');
});