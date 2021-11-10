<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ReplyController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::name('user.')->group(function () {
    Route::get('/registration', [UserController::class, 'registrationAvailability'])->name('registration');

    Route::post('/registration', [UserController::class, 'registration']);

    Route::get('/login', [UserController::class, 'loginAvailability'])->name('login');

    Route::post('/login', [UserController::class, 'login']);

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::resource('user', UserController::class);
Route::resource('topic', TopicController::class);
Route::resource('reply', ReplyController::class);
