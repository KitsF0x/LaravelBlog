<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/home', function () {
    return redirect(route('homepage'));
});

Auth::routes();

// Posts
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::middleware(['can:isAdmin'])->group(function () {
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
});
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

// Comments
Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');
});

// Admin links
Route::middleware(['can:isAdmin'])->group(function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'panel'])->name('admin.panel');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
});

// Manage users
Route::middleware(['can:isAdmin'])->group(function() {
    Route::post('/user/ban/{id}', [App\Http\Controllers\UserManagementController::class, 'changeBanStatus'])->name('users.management.ban');
});