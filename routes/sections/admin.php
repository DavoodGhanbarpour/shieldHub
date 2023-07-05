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
Route::group(['prefix' => 'users'], function () {
    Route::resource('users', UserController::class);

    Route::get('{user}/inbounds', [UserController::class, 'inbounds'])->name('users.inbounds');
    Route::post('{user}/inbounds', [UserController::class, 'assignInbounds'])->name('users.assignInbounds');

    Route::get('{user}/invoices', [ReportController::class, 'allUsers'])->name('histories.invoices');
    Route::get('{user}/subscriptions', [ReportController::class, 'allUsers'])->name('histories.subscriptions');
});

// Inbound Routes
Route::group(['prefix' => 'inbounds'], function () {
    Route::get('bulk-create', [InboundController::class, 'bulkCreate'])->name('inbounds.bulk.create');
    Route::post('bulk-create', [InboundController::class, 'bulkStore'])->name('inbounds.bulk.store');
    Route::resource('inbounds', InboundController::class);
});

// Server Routes
Route::resource('servers', ServerController::class);

// Invoice Routes
Route::resource('invoices', InvoiceController::class);

// Report Routes
Route::group(['prefix' => 'reports'], function () {
    Route::get('users/invoices', [ReportController::class, 'allUsers'])->name('reports.users.invoices');
});


