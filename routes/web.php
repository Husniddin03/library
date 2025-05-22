<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\AuthorController as UserAuthorController;
use App\Http\Controllers\User\BookController as UserBookController;

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

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/contact', function () {
    return view('user.contact');
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);
});

Route::post('users/login', [UserUserController::class, 'login'])->name('users.login');

Route::resource('users', UserUserController::class);
Route::resource('authors', UserAuthorController::class);
Route::resource('books', UserBookController::class);
