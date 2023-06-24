<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::view('/login/{locale?}', 'general.login.login')->name('login');
    Route::post('/login{locale}', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware(['auth', 'setLocale'])->get('/logout', [AuthController::class, 'logout'])->name('logout');
