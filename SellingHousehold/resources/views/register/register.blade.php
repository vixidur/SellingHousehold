<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/registerstyle.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('layouts.header')
    <div class="container-register">
        <center>
            <div class="form-header">
                <img src="{{ asset('images/logo-ver-color.png') }}" alt="Logo" class="logo">
                <h2>Đăng kí tài khoản mới!</h2>
                <p class="register-desc">Xin mời bạn nhập đầy đủ thông tin đăng kí.</p>
            </div>
        </center>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" id="fullname" placeholder="Vui lòng nhập họ và tên" name="full_name"
                    value="{{ old('full_name') }}" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Vui lòng nhập địa chỉ email" name="email"
                    value="{{ old('email') }}" required>
            </div>
            <div class="input-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="username" placeholder="Vui lòng nhập tài khoản" name="username"
                    value="{{ old('username') }}" required>
            </div>
            <div class="input-group password-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" placeholder="Vui lòng nhập mật khẩu" name="password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="input-group">
                <input type="checkbox" id="terms" class="form-check-input" name="agreed_to_terms" required>
                <label for="terms">Tôi đồng ý các điều khoản của hệ thống.</label>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
            <p class="login-link">Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>.</p>
        </form>
    </div>
    @include('layouts.footer')

    <!-- Tạo biến JavaScript từ session -->
    <script>
        // Nếu không có session 'verify_email', trả về null
        const verifyEmailMessage = {!! json_encode(session('verify_email') ?? '') !!}; // Sử dụng json_encode() để chuyển PHP sang JS
    </script>

    <script>
        // hide/show password
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // sweet alert 2 for email verification message
        document.addEventListener('DOMContentLoaded', function() {
            if (verifyEmailMessage) { // Kiểm tra nếu có thông báo xác minh email từ server
                Swal.fire({
                    title: 'Xác minh email của bạn!',
                    text: `Chúng tôi đã gửi email ${verifyEmailMessage} đến bạn. Vui lòng kiểm tra email để xác nhận đăng ký.`,
                    icon: 'info',
                    confirmButtonText: 'Đồng ý'
                });
            }
        });
    </script>
</body>

</html>
