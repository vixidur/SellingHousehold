<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/registerstyle.css') }}">
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')
    <div class="container-register">
        <div class="form-header">
            <img src="{{ asset('images/logo-ver-color.png') }}" alt="Logo" class="logo">
            <h2>Đăng kí tài khoản mới!</h2>
            <p>Xin mời bạn nhập đầy đủ thông tin đăng kí.</p>
        </div>
        <form>
            <div class="input-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" id="myInput" placeholder="Vui lòng nhập họ và tên">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="myInput" placeholder="Vui lòng nhập địa chỉ email">
            </div>
            <div class="input-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="myInput" placeholder="Vui lòng nhập tài khoản">
            </div>
            <div class="input-group password-group">
                <label for="myInput">Mật khẩu</label>
                <input type="password" id="myInput" placeholder="Vui lòng nhập mật khẩu" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="input-group">
                <input type="checkbox" id="terms">
                <label for="terms">Tôi đồng ý các điều khoản của hệ thống.</label>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
            <p class="login-link">Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>.</p>
        </form>
    </div>
    <!-- Include footer -->
    @include('layouts.footer')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#myInput');

        togglePassword.addEventListener('click', function(e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>
