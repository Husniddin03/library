<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\User\PageController;

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

Route::get('/', [PageController::class, 'welcome'])->name('user.welcome');
Route::get('/about', [PageController::class, 'about'])->name('user.about');
Route::get('/contact', [PageController::class, 'contact'])->name('user.contact');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);
});

Route::post('users/login', [UserUserController::class, 'login'])->name('users.login');
Route::post('users/logout', [UserController::class, 'logout'])->name('users.logout');

Route::post('books/comment{id}', [UserBookController::class, 'comment'])->name('books.comment');
Route::post('books/like{id}', [UserBookController::class, 'like'])->name('books.like');
Route::post('books/unlike{id}', [UserBookController::class, 'unlike'])->name('books.unlike');
Route::get('books/download/{id}', [UserBookController::class, 'download'])->name('books.download');
Route::get('books', [UserBookController::class, 'index'])->name('books.index');
Route::get('books/{id}', [UserBookController::class, 'show'])->name('books.show');

Route::resource('users', UserUserController::class);
