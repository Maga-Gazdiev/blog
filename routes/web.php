<?php

use App\Helpers\Telegram;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebhookController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::prefix('user')->middleware(['auth'])->controller(OfficeController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/posts/like', 'postsLike')->name('user.posts.like');
    Route::get('/posts', 'posts')->name('user.posts');
    Route::get('/likedComment', 'likedComment')->name('user.likedComment');
    Route::get('/comment', 'comment')->name('user.comment');
});

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/create', 'create')->name('posts.create');
    Route::post('/', 'store')->name('posts.store');
    Route::get('/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/{post}', 'update')->name('posts.update');
    Route::delete('/{post}', 'destroy')->name('posts.destroy');
    Route::get('/{post}', 'show')->name('posts.show');
});

Route::prefix('comments')->controller(CommentController::class)->group(function () {
    Route::post('/', 'store')->name('comments.store');
    Route::get('/{comment}/edit', 'edit')->name('comments.edit');
    Route::put('/{comment}', 'update')->name('comments.update');
    Route::delete('/{comment}', 'destroy')->name('comments.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->controller(LikeController::class)->group(function () {
    Route::post('/like/{post}', 'like')->name('like');
    Route::post('/unlike/{post}', 'unlike')->name('unlike');
    Route::post('/like/comment/{post}', 'likeComment')->name('like.comment');
    Route::post('/unlike/comment/{post}', 'unlikeComment')->name('unlike.comment');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('other')->controller(OtherController::class)->group(function () {
    Route::get('/', 'index')->name('other');
    Route::get('/bored', 'bored')->name('other.bored');
    Route::get('/ipify', 'ipify')->name('other.ipify');
    Route::post('/predict', 'national')->name('other.national');
    Route::post('/ipinfo', 'ipinfo')->name('other.ipinfo');
});

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/', [BookController::class, 'store'])->name('books.store');

    // Роуты для глав
    Route::get('/{book_id}/chapters', [ChapterController::class, 'index'])->name('chapters.index');
    Route::get('/books/{book_id}/chapters/{chapter_id}', [ChapterController::class, 'show'])->name('chapters.show');
    Route::get('/{book}/chapters/create', [ChapterController::class, 'create'])->name('chapters.create');
    Route::post('/{book}/chapters', [ChapterController::class, 'store'])->name('chapters.store');
    Route::get('/{book}/chapters/{chapter}/edit', [ChapterController::class, 'edit'])->name('chapters.edit');
    Route::put('/{book}/chapters/{chapter}', [ChapterController::class, 'update'])->name('chapters.update');
});



Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
Route::post('/add-friend', [FriendController::class, 'store'])->name('friends.store');

Route::prefix('messages')->controller(MessageController::class)->group(function () {
    Route::get('/messages/{user}', 'show')->name('messages.show');
    Route::post('/messages/{user}', 'store')->name('messages.store');
});

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return view('register.verify');
})->middleware(['auth', 'signed'])->name('verification.verify');
