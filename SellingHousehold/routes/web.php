<?php 
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
// Route chính
Route::get('/', function () {
    return view('index');
});

// Route đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Route đăng ký
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route giỏ hàng
Route::get('cart', [CartController::class, 'cartForm'])->name('cart');
// Route admin 
Route::get('admin', [AdminController::class, 'admin']);
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
