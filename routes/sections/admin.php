<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboundController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Dashboard Routes
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
});

// User Routes
Route::resource('users', UserController::class);
Route::name('users.')->prefix('users')->group(function () {
    Route::get('{user}/inbounds', [UserController::class, 'inbounds'])->name('inbounds');
    Route::post('{user}/inbounds', [UserController::class, 'assignInbounds'])->name('assignInbounds');
    Route::get('{user}/invoices', [ReportController::class, 'allUsers'])->name('invoices');
    Route::get('{user}/subscriptions', [ReportController::class, 'allUsers'])->name('subscriptions');
});

// Inbound Routes
Route::name('inbounds.')->prefix('inbounds')->group(function () {
    Route::get('bulk-create', [InboundController::class, 'bulkCreate'])->name('bulk.create');
    Route::post('bulk-create', [InboundController::class, 'bulkStore'])->name('bulk.store');
});
Route::resource('inbounds', InboundController::class);


// Server Routes
Route::resource('servers', ServerController::class);

// Invoice Routes
Route::resource('invoices', InvoiceController::class);

// Report Routes
Route::name('reports.')->prefix('reports')->group(function () {
    Route::get('users/invoices', [ReportController::class, 'allUsers'])->name('users.invoices');
});


