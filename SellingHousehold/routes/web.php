<?php 
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
// Route cho trang overview
Route::get('overview', function () {
    return view('overview.overview'); // Điều chỉnh đường dẫn view nếu cần
})->name('overview');
// Route chính
Route::get('/', function () {
    return view('index');
});

// Route đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route đăng ký
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route giỏ hàng
Route::get('cart', [CartController::class, 'cartForm'])->name('cart');
// Route thanh toán
Route::get('payment', [PaymentController::class, 'paymentForm'])->name('payment');

// Route admin 
Route::prefix('admin')->group(function() {
    // Hiển thị form đăng nhập admin
    Route::get('auth/login', [AuthController::class, 'AdminLogin'])->name('admin.login');
    
    // Xử lý đăng nhập admin
    Route::post('auth/login', [AuthController::class, 'login'])->name('admin.login.post');
    
    // Xử lý my profile 
    Route::get('layouts/myprofile', [AuthController::class, 'myprofile'])->name('myprofile');
    
    //Xử lý categories
    Route::get('category', [AuthController::class, 'category'])->name('category');
    
    // Đăng xuất admin
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Trang dashboard admin (sau khi đăng nhập thành công)
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
});

// Route yêu cầu xác thực email
Route::get('/email/verify', function () {
    return view('auth.verify');  // Tạo trang auth.verify để người dùng xác thực email
})->middleware('auth')->name('verification.notice');

// Route xử lý xác thực email khi người dùng nhấp vào liên kết trong email
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

// Route gửi lại email xác thực nếu người dùng chưa nhận được email
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
