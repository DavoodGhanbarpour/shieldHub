<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('admin.pages.home.home');
})->name('dashboard');

Route::resource('users', UserController::class);
