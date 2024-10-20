<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <title>Quên Mật Khẩu</title>
    <style>
        .login-container {
            margin: 0 auto;
            box-sizing: border-box;
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="login-container mt-5">
        <h2 class="text-center">Quên Mật Khẩu</h2>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email"
                    required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Gửi xác nhận</button>
            </div>
        </form>
    </div>
</body>

</html>
