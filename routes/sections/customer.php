<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::view('home', 'customer.pages.home.index')->name('home');

