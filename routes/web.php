<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::redirect('/', 'login');

Route::prefix('/')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('/post', [PostController::class, 'buatPost'])->name('buat.post');
    Route::get('/post/{post}/edit', [PostController::class, 'editPost'])->name('edit.post');
    Route::put('/post/{post}', [PostController::class, 'updatePost'])->name('update.post');
    Route::delete('/post/{post}', [PostController::class, 'hapusPost'])->name('hapus.post');
    Route::get('/post/{post}', [PostController::class, 'showPost'])->name('show.post');
    Route::post('/post/{post}/comment', [CommentController::class, 'buatComment'])->name('buat.comment');
    Route::delete('/post/{post}/comment/{comment}', [CommentController::class, 'hapusComment'])->name('hapus.comment');
    Route::get('/post/{post}/comment/{comment}/edit', [CommentController::class, 'editComment'])->name('edit.comment');
    Route::put('/post/{post}/comment/{comment}', [CommentController::class, 'updateComment'])->name('update.comment');
});


require __DIR__ . '/auth.php';
