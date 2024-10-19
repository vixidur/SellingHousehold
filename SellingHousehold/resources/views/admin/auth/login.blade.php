<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>ĐĂNG NHẬP ADMIN</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-group a {
            color: #007bff;
        }

        .form-group a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container mt-5">
        <h2 class="text-center">ĐĂNG NHẬP ADMIN</h2>
        <form id="loginForm" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu"
                    required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            </div>
            <div class="form-group text-center">
                <a href="#">Quên mật khẩu?</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn gửi form mặc định

                const email = $('#email').val();
                const password = $('#password').val();

                // Thực hiện AJAX để gửi dữ liệu
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        // Xử lý các trường hợp
                        if (response.status === 'success') {
                            // Đăng nhập thành công với admin
                            Swal.fire({
                                title: 'Đăng nhập thành công!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.href = response
                                    .redirectUrl; // Chuyển hướng đến trang admin
                            });
                        } else if (response.status === 'not_admin') {
                            // Người dùng không phải là admin
                            Swal.fire({
                                title: 'Không có quyền truy cập!',
                                text: 'Bạn không có quyền truy cập vào trang này.',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Nếu thông tin đăng nhập không chính xác
                            Swal.fire({
                                title: 'Tài khoản hoặc mật khẩu không đúng!',
                                text: 'Vui lòng kiểm tra lại thông tin đăng nhập.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        // Xử lý lỗi từ server (ví dụ lỗi máy chủ hoặc kết nối)
                        Swal.fire({
                            title: 'Lỗi!',
                            text: 'Có lỗi xảy ra. Vui lòng thử lại sau.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
