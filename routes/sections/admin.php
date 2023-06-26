<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboundController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('home', [DashboardController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::get('users/{user}/inbounds', [UserController::class, 'inbounds'])->name('users.inbounds');
Route::post('users/{user}/inbounds', [UserController::class, 'assignInbounds'])->name('users.assignInbounds');

Route::resource('inbounds', InboundController::class);

Route::resource('servers', ServerController::class);
