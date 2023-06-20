<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'admin.pages.home.home')->name('home');
Route::resource('users', UserController::class);
