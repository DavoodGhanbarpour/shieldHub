<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return abort(404);
});

Route::middleware('guest')->get('/', function () { return redirect()->route('auth.login'); })->name('root');
Route::get('/home', function () {
    if(auth()->user()->isAdmin())
        return redirect()->route('admin.home');

    return redirect()->route('customer.home');
})->name('home');

Route::name('auth.')->middleware(['setLocale'])->group(function () {
    include_once __DIR__.DIRECTORY_SEPARATOR.'sections'.DIRECTORY_SEPARATOR.'auth.php';
});

Route::middleware(['auth', 'role:admin', 'setLocale'])->prefix('admin')->name('admin.')->group(function () {
    include_once __DIR__.DIRECTORY_SEPARATOR.'sections'.DIRECTORY_SEPARATOR.'admin.php';
});

Route::middleware(['auth', 'role:customer', 'setLocale'])->prefix('customer')->name('customer.')->group(function () {
    include_once __DIR__.DIRECTORY_SEPARATOR.'sections'.DIRECTORY_SEPARATOR.'customer.php';
});

Route::middleware(['auth', 'setLocale'])->prefix('profile')->name('profile.')->group(function () {
    include_once __DIR__.DIRECTORY_SEPARATOR.'sections'.DIRECTORY_SEPARATOR.'profile.php';
});
