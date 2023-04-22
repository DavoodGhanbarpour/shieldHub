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

Route::get('/', function () {
    return view('login.login');
});

Route::middleware('auth')->name('auth.')->group(function(){
    include_once __DIR__.'sections'.DIRECTORY_SEPARATOR."auth.php";
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    include_once __DIR__.'sections'.DIRECTORY_SEPARATOR."admin.php";
});

Route::middleware('auth')->prefix('customer')->name('customer.')->group(function(){
    include_once __DIR__.'sections'.DIRECTORY_SEPARATOR."customer.php";
});
