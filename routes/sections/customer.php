<?php

use App\Http\Controllers\Customer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('home', [DashboardController::class, 'index'])->name('home');
