<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/login/{locale?}', function (string $locale = User::SUPPORTED_LANGUAGES['en']['key']) {
    if (! in_array($locale, array_column(User::SUPPORTED_LANGUAGES,'key'))) {
        return abort(404);
    }
    App::setLocale($locale);
    return view('general.login.login');
})->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
