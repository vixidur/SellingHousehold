<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
</head>

<body class="login-page">
    @include('layouts.header')

    <div class="login-container">
        <center>
            <div class="logo">
                <img src="{{ asset('images/logo-ver-color.png') }}" alt="Logo" class="login-logo" height="120px">
            </div>
            <h2>Đăng nhập vào hệ thống!</h2>
            <p class="login-desc">Xin mời bạn nhập đầy đủ thông tin đăng nhập.</p>
        </center>

        <form class="login-form" method="POST" action="{{ route('login.post') }}">
            @csrf

            <!-- Hiển thị lỗi chung -->
            @if ($errors->has('login'))
                <div class="error-message">
                    <p style="color: red; text-align: center;">{{ $errors->first('login') }}</p>
                </div>
            @endif

            <div class="input-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="username" name="username" placeholder="Nhập tài khoản"
                    value="{{ old('username') }}" required>
                @if ($errors->has('username'))
                    <p style="color: red; font-size: 0.9em;">{{ $errors->first('username') }}</p>
                @endif
            </div>

            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    <span class="toggle-password" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                @if ($errors->has('password'))
                    <p style="color: red; font-size: 0.9em;">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ghi nhớ tài khoản.</label>
            </div>

            <button type="submit" class="login-btn">ĐĂNG NHẬP</button>
        </form>

        <div class="register-link">
            <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký.</a></p>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Hiển thị/hide mật khẩu
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            const icon = togglePassword.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        // Thông báo thành công/thất bại từ session
        @if (Session::has('success'))
            Notiflix.Notify.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            Notiflix.Notify.error("{{ Session::get('error') }}");
        @endif

        // Hiển thị lỗi validate
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Lỗi đăng nhập',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'OK',
            });
        @endif

        // Hiển thị xác minh email
        @if (session('verify_email'))
            Swal.fire({
                icon: 'success',
                title: 'Xác minh email của bạn',
                text: 'Chúng tôi đã gửi email đến {{ session('verify_email') }}. Vui lòng kiểm tra email để xác nhận đăng ký.',
                showConfirmButton: false,
                timer: 5000
            });
        @endif
    </script>
</body>

</html>
