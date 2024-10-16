<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UNETI HOUSEHOLD | BÁN ĐỒ GIA DỤNG UNETI')</title>
    <link rel="stylesheet" href="{{ asset('css/headerstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo-web.png') }}" type="image/x-icon" />
</head>

<body>
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="UNETI HOUSEHOLD LOGO" width="180px"
                            height="70px">
                    </a>
                </div>
                <div class="system-shop">
                    <a href="{{ url('/info-shop') }}">Hệ thống cửa hàng</a>
                </div>
                <div class="search-products">
                    <input type="text" name="search-products" class="search-items" placeholder="Tìm kiếm sản phẩm"><i
                        class="fa-solid fa-magnifying-glass"></i>
                    <div class="line"></div>
                </div>
                <div class="phone-ring">
                    <span class="phone-icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </span>

                    <span>Hotline <br><b>0862587229</b></span>
                </div>
                <div class="icon-user">
                    <i class="fa-regular fa-circle-user"></i>
                </div>
                <div class="label-user">
                    <p><a href="{{ route('login') }}">Đăng nhập</a><br><a href="{{ route('register') }}">Đăng ký</a></p>
                </div>
            </div>
        </div>
        <div class="container-nav">
            <nav>
                <ul>
                    <li><a href="#">Nồi, chảo</a><i class="fa-solid fa-caret-down"></i></li>
                    <li><a href="#">Sản phẩm giữ nhiệt</a><i class="fa-solid fa-caret-down"></i></li>
                    <li><a href="#">Gia dụng bếp</a><i class="fa-solid fa-caret-down"></i></li>
                    <li><a href="#">Máy xay, máy ép</a><i class="fa-solid fa-caret-down"></i></li>
                    <li><a href="#">Thiết bị bếp</a><i class="fa-solid fa-caret-down"></i></li>
                    <li><a href="#">Chăm sóc thiết bị</a><i class="fa-solid fa-caret-down"></i></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
</body>

</html>
