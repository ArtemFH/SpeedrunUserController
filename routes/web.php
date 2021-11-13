<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ReplyController;

Route::get('/', [TopicController::class, 'index'])->name('home');

Route::name('user.')->group(function () {
    Route::get('/registration', [UserController::class, 'registrationAvailability'])->name('registration');

    Route::post('/registration', [UserController::class, 'registration']);

    Route::get('/login', [UserController::class, 'loginAvailability'])->name('login');

    Route::post('/login', [UserController::class, 'login']);

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/index', [UserController::class, 'indexAdmin'])->name('index');

    Route::get('/show/{id}', [UserController::class, 'showAdmin'])->name('show');

    Route::get('/approved/{id}', [UserController::class, 'approved'])->name('approved');

    Route::get('/rejected/{id}', [UserController::class, 'rejected'])->name('rejected');

    Route::get('/users', [UserController::class, 'users'])->name('users');

    Route::get('/ban/{id}', [UserController::class, 'ban'])->name('ban');
});

Route::post('/send/{id}', [ReplyController::class, 'store'])->name('send');

Route::resource('user', UserController::class);
Route::resource('topic', TopicController::class);
Route::resource('reply', ReplyController::class);
