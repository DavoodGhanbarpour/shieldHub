<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('admin.pages.home.home');
})->name('dashboard');

Route::resource('users', UserController::class, [
    'names' => [
        'index'     => 'users',
        'create'    => 'userAdd',
        'edit'      => 'userEdit',
        'store'     => 'userStore',
        'update'    => 'userUpdate',
    ]
]);
