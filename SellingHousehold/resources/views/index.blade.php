<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNETI HOUSEHOLD | BÁN ĐỒ GIA DỤNG UNETI</title>
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
</head>

<body>
    @if (Route::currentRouteName() !== 'login')
        @include('layouts.header')
    @endif
<<<<<<< HEAD
    @include('maincontent.main')
=======

    @include('maincontents.subheader')

>>>>>>> 8f4b6d3086f031739f067d63861ea159fffb03c1
    @if (Route::currentRouteName() !== 'login')
        @include('layouts.footer')
    @endif

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
