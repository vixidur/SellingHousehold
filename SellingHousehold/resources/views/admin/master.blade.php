<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TRANG CHỦ ADMIN')</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('admin.layouts.nav')

    <!-- Header -->
    @include('admin.layouts.headeradmin')

    <!-- Main content area -->
    <div class="container">
        @yield('content') <!-- Nội dung động sẽ thay đổi ở đây -->
    </div>

    <!-- Footer -->
    @include('admin.layouts.footeradmin')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
