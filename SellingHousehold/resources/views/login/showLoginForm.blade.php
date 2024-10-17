<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
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

        <form class="login-form">
            <div class="input-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="myInput" name="username" placeholder="Nhập tài khoản" required>
            </div>

            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    <span class="toggle-password" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
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

    <!-- Include footer -->
    @include('layouts.footer')

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            const icon = togglePassword.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Đăng ký thành công!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                timer: 3000
            }).then(() => {
                window.location.href = "{{ route('login') }}";
            });
        </script>
    @endif
</body>

</html>
