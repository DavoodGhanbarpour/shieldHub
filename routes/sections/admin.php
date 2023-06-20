<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::view('home', 'admin.pages.home.index')->name('home');
Route::resource('users', UserController::class);
Route::view('inbounds', 'admin.pages.inbounds.index')->name('inbounds');
