<?php

use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('home', [DashboardController::class, 'index'])->name('home');
Route::get('invoices', [InvoiceController::class, 'index'])->name('home');
