<?php

use App\Http\Controllers\Admin\InboundController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::view('home', 'admin.pages.home.index')->name('home');

Route::resource('users', UserController::class);
Route::get('users/{user}/inbounds', [UserController::class, 'inbounds'])->name('users.inbounds');
Route::post('users/{user}/inbounds', [UserController::class, 'assignInbounds'])->name('users.assignInbounds');

Route::resource('inbounds', InboundController::class);
