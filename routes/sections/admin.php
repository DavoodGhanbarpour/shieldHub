<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    exit('we lack view here');
})->name('dashboard');

Route::resource('users', UserController::class);
