<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboundController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('home', [DashboardController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::get('users/{user}/inbounds', [UserController::class, 'inbounds'])->name('users.inbounds');
Route::post('users/{user}/inbounds', [UserController::class, 'assignInbounds'])->name('users.assignInbounds');

Route::get('inbounds/bulk-create', [InboundController::class, 'bulkCreate'])->name('inbounds.bulk.create');
Route::post('inbounds/bulk-create', [InboundController::class, 'bulkStore'])->name('inbounds.bulk.store');
Route::resource('inbounds', InboundController::class);

Route::resource('servers', ServerController::class);

Route::resource('invoices', InvoiceController::class);

Route::get('reports/users/invoices', [ReportController::class, 'allUsers'])->name('reports.users.invoices');
