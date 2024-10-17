<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;

// Đường dẫn cho các route
Route::get('/', function () {
    return view('index');
});
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::get('cart', [CartController::class, 'cartForm'])->name('cart');

Route::post('register', [RegisterController::class, 'register']);

