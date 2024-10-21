<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TRANG CHỦ')</title>
    <link rel="stylesheet" href="{{ asset('css/headerstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />

</head>

<body>
    @if (Route::currentRouteName() !== 'login')
        @include('layouts.header')
    @endif
    @include('maincontent.main')


    @if (Route::currentRouteName() !== 'login')
        @include('layouts.footer')
    @endif

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
