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
    Route::get('{user}/inbounds2', [UserController::class, 'inbounds2'])->name('inbounds2');
    Route::get('{user}/inbounds/json', [UserController::class, 'inboundsJson'])->name('inbounds.json');
    Route::post('{user}/inbounds/json', [UserController::class, 'attachInbounds'])->name('inbounds.create');
    Route::delete('{user}/inbounds/{subscription}/json', [UserController::class, 'detachInbounds'])->name('inbounds.delete');
    Route::post('{user}/inbounds', [UserController::class, 'assignInbounds'])->name('assignInbounds');
    Route::get('{user}/invoices', [UserController::class, 'invoices'])->name('invoices');
    Route::get('{user}/invoices/json', [UserController::class, 'invoicesJson'])->name('invoices.json');
    Route::get('{user}/subscriptions', [UserController::class, 'subscriptions'])->name('subscriptions');
    Route::get('{user}/subscriptions/json', [UserController::class, 'subscriptionsJson'])->name('subscriptions.json');
});

Route::name('subscriptions.')->prefix('subscriptions')->group(function (){
    Route::post('renew', [UserController::class, 'renewSubscriptions'])->name('renew');
    Route::post('renew/{user}', [UserController::class, 'renewSubscriptionsById'])->name('renew.bulk');
});

// Inbound Routes
Route::name('inbounds.')->prefix('inbounds')->group(function () {
    Route::get('{inbound}/users', [InboundController::class, 'users'])->name('users');
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
    Route::get('logs/logins', [ReportController::class, 'logs'])->name('logs.logins');
});
