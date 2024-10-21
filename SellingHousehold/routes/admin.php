<?php
// routes/admin.php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
// Route admin
Route::prefix('admin')->group(function() {
// Hiển thị form đăng nhập admin
    Route::get('auth/login', [AuthController::class, 'AdminLogin'])->name('admin.login');

    // Xử lý đăng nhập admin
    Route::post('auth/login', [AuthController::class, 'login'])->name('admin.login.post');

    // Hiển thị trang quên mật khẩu
    Route::get('auth/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

    // Xử lý quên mật khẩu
    Route::post('auth/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Hiển thị trang đặt lại mật khẩu
    Route::get('auth/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    // Xử lý đặt lại mật khẩu
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Xử lý my profile
    Route::get('layouts/myprofile', [AuthController::class, 'myprofile'])->name('myprofile');
    Route::post('layouts/myprofile', [AuthController::class, 'updateProfile'])->name('myprofile.update');

    // Xử lý categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Xử lý products
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Đăng xuất admin
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Trang dashboard admin (sau khi đăng nhập thành công)
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
});

require __DIR__ . '/admin.php';
