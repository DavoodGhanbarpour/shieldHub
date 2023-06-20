<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('customer.pages.home.home');
})->name('dashboard');
