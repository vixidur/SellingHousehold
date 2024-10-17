<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/registerstyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                <input type="text" id="fullname" placeholder="Vui lòng nhập họ và tên" name="full_name" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Vui lòng nhập địa chỉ email" name="email" required>
            </div>
            <div class="input-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="username" placeholder="Vui lòng nhập tài khoản" name="username" required>
            </div>
            <div class="input-group password-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" placeholder="Vui lòng nhập mật khẩu" name="password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="input-group">
                <input type="checkbox" id="terms" name="agreed_to_terms" required>
                <label for="terms">Tôi đồng ý các điều khoản của hệ thống.</label>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
            <p class="login-link">Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>.</p>
        </form>

    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
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

        // sweet alert 2
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Thành công!',
                    text: {!! json_encode(session('success')) !!},
                    icon: 'success',
                    confirmButtonText: 'Đồng ý'
                });
            @endif
        });
    </script>
</body>

</html>
