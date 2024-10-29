<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route cho trang overview
// Route::get('/', function () {
//     return view('index'); // Điều chỉnh đường dẫn view nếu cần
// });
// Route chính
Route::get('/', [ProductController::class, 'showProducts'])->name('products.show');

// Route đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route đăng ký
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route giỏ hàng
Route::get('/cart', [CartController::class, 'cartForm'])->name('cart.show');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
// Checkout
Route::middleware('auth')->group(function () {
// Checkout
    Route::get('/checkout', [CheckoutController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
});
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');

//Checkout VNPAY
Route::post('/vnpayment', [CheckoutController::class, 'createPayment'])->name('payment');
Route::get('/vnpay/callback', [PaymentController::class, 'vnpayCallback'])->name('vnpay.callback');


// Route InforShop
Route::get('/info-shop', [InfoController::class, 'index'])->name('info-shop.index');
// Route products submenu
Route::get('products/noi-chao', [ProductController::class, 'showNoiChao'])->name('products.noi-chao');

// Route to display products
Route::get('/overview', [ProductController::class, 'showProducts'])->name('products.show');
Route::prefix('products')->group(function(){
    Route::get('chao', [ProductController::class, 'showChao'])->name('products.chao');
    Route::get('coc', [ProductController::class, 'showCoc'])->name('products.coc');
    Route::get('binh', [ProductController::class, 'showBinh'])->name('products.binh');
    Route::get('hop', [ProductController::class, 'showHop'])->name('products.hop');
    Route::get('phich', [ProductController::class, 'showPhich'])->name('products.phich');
    Route::get('dao', [ProductController::class, 'showDao'])->name('products.dao');
    Route::get('dungcu', [ProductController::class, 'showDungcu'])->name('products.dungcu');
    Route::get('mayep', [ProductController::class, 'showMayep'])->name('products.mayep');
    Route::get('thot', [ProductController::class, 'showThot'])->name('products.thot');
    Route::get('mayxay', [ProductController::class, 'showMayxay'])->name('products.mayxay');
    Route::get('bepdien', [ProductController::class, 'showBepdien'])->name('products.bepdien');
    Route::get('amsieutoc', [ProductController::class, 'showAmsieutoc'])->name('products.amsieutoc');
    Route::get('maysaytoc', [ProductController::class, 'showMaysaytoc'])->name('products.maysaytoc');
    Route::get('banchai', [ProductController::class, 'showBanchai'])->name('products.banchai');
});
// Route admin
Route::prefix('admin')->group(function () {
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
// Route yêu cầu xác thực email
Route::get('/email/verify', function () {
    return view('auth.verify'); // Tạo trang auth.verify để người dùng xác thực email
})->middleware('auth')->name('verification.notice');

// Route xử lý xác thực email khi người dùng nhấp vào liên kết trong email
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

// Route gửi lại email xác thực nếu người dùng chưa nhận được email
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
