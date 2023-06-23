<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/{user}/locale/update', [ProfileController::class,'changeLocale'])->name('locale.update');

