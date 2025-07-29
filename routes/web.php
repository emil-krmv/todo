<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', '/login');

Route::resource('tasks', TaskController::class)->middleware('auth');

Route::singleton('profile', ProfileController::class)->middleware('auth');

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::delete('/login', 'destroy')->name('logout');
});
