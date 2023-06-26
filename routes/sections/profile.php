<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/{user}/update', [ProfileController::class, 'changeLocale'])->name('locale.update');
