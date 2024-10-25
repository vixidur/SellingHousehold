<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UNETI HOUSEHOLD | BÁN ĐỒ GIA DỤNG UNETI')</title>
    <link rel="stylesheet" href="{{ asset('css/headerstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
</head>

<body>
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <a href="{{ url('/overview') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="UNETI HOUSEHOLD LOGO" width="180px"
                            height="70px">
                    </a>
                </div>
                <div class="system-shop">
                    <a href="{{ route('info-shop.index') }}">Hệ thống cửa hàng</a>
                </div>
                <div class="search-products">
                    <div class="search-wrapper">
                        <input type="text" name="search-products" class="search-items"
                            placeholder="Tìm kiếm sản phẩm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="line">

                    </div>
                </div>
                <div class="phone-ring">
                    <span class="phone-icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </span>

                    <span>Hotline <br><b>0862587229</b></span>
                </div>
                <div class="label-icon">
                    <div class="icon-user">
                        <i class="fa-regular fa-circle-user"></i>
                    </div>
                    <div class="label-user">
                        @auth
                            <p id="label-txtLogin" style="color: white">Xin chào, {{ Auth::user()->username }}<br>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                    xuất</a>
                            </p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth

                        @guest
                            <p id="label-txtLogin"><a href="{{ route('login') }}">Đăng nhập</a><br>
                                <a href="{{ route('register') }}">Đăng ký</a>
                            </p>
                        @endguest
                    </div>
                </div>
                <div class="cart-header">
                    <div class="shopping-cart-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="cart-label">
                        <a href="{{ route('cart.show') }}">Giỏ Hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-nav">
            <nav>
                <ul>

                    <li class="dropdown">
                        <a href="#">Nồi, chảo<i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h3>Nồi</h3>
                                <a href="{{ route('products.noi-chao')}}">Nồi inox, bộ nồi inox</a>
                                <a href="{{ route('products.noi-chao')}}">Nồi chống dính</a>
                                <a href="{{ route('products.noi-chao')}}">Nồi hấp, nồi lẩu</a>
                                <a href="{{ route('products.noi-chao')}}">Nồi áp suất bếp từ</a>
                            </div>
                            <div class="column">
                                <h3>Chảo</h3>
                                <a href="{{ route('products.chao')}}">Chảo inox</a>
                                <a href="{{ route('products.chao')}}">Chảo nhôm</a>
                                <a href="{{ route('products.chao')}}">Chảo chống dính</a>
                                <a href="{{ route('products.chao')}}">Chảo siêu nhẹ</a>
                            </div>

                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Sản phẩm giữ nhiệt<i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h3>Cốc giữ nhiệt</h3>
                                <a href="{{ route('products.coc')}}">Cốc giữ nhiệt Cốc giữ nhiệt inox 304 Elmich EL8312 </a>
                                <a href="{{ route('products.coc')}}">Cốc giữ nhiệt inox</a>
                            </div>
                            <div class="column">
                                <h3>Bình đựng thức ăn giữ nhiệt</h3>
                                <a href="{{ route('products.binh')}}">Bình đựng thức ăn giữ nhiệt inox 304</a>
                                <a href="{{ route('products.binh')}}">Bình đựng thức ăn giữ nhiệt inox 304 Elmich</a>
                            </div>
                            <div class="column">
                                <h3>Hộp cơm giữ nhiệt</h3>
                                <a href="{{ route('products.hop')}}">Hộp cơm 2 tầng inox 304</a>
                                <a href="{{ route('products.hop')}}">Hộp cơm 2 tầng inox 304 Elimich</a>
                            </div>
                            <div class="column">
                                <h3>Bình,phích giữ nhiệt</h3>
                                <a href="{{ route('products.phich')}}">Phích giữ nhiệt gia đình inox 304</a>
                                <a href="{{ route('products.phich')}}">Phích giữ nhiệt gia đình inox 304 Elmich</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Gia dụng bếp<i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h3>Bộ dao</h3>
                                <a href="{{ route('products.dao')}}">Dao gọt hoa quả Elmich Diamond </a>
                                <a href="{{ route('products.dao')}}">Dao thái Elmich Ultra Sharp</a>
                                <a href="{{ route('products.dao')}}">Dao đa năng Elmich Ultra Sharp</a>
                            </div>
                            <div class="column">
                                <h3>Bộ thớt</h3>
                                <a href="{{ route('products.thot')}}">Thớt an toàn- đa năng</a>
                                <a href="{{ route('products.thot')}}">Bộ thớt nhựa đa năng Smartcook</a>
                                <a href="{{ route('products.thot')}}">Bộ thớt nhựa đa năng Elmich</a>
                            </div>
                            <div class="column">
                                <h3>Dụng cụ nhà bếp</h3>
                                <a href="{{ route('products.dungcu')}}">Hộp nhựa thực phẩm Elmich </a>
                                <a href="{{ route('products.dungcu')}}">Hộp đựng thực phẩm inox</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Máy xay, máy ép<i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h3>Máy xay sinh tố</h3>
                                <a href="{{ route('products.mayxay')}}">Máy xay sinh tố</a>
                                <a href="{{ route('products.mayxay')}}">Máy xay sinh tố cầm tay</a>
                                <a href="{{ route('products.mayxay')}}">Máy xay sinh tố Elmich BLE</a>
                                <a href="{{ route('products.mayxay')}}">Máy xay sinh tố Elmich </a>
                            </div>
                            <div class="column">
                                <h3>Máy ép chậm</h3>
                                <a href="{{ route('products.mayep')}}">Máy ép chậm trái cây mini Smartcook</a>
                                <a href="{{ route('products.mayep')}}">Máy ép chậm JEE-8723</a>
                                <a href="{{ route('products.mayep')}}">BMáy ép chậm Elmich JEE-8759</a>
                                <a href="{{ route('products.mayep')}}">Máy ép chậm Elmich JEE</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Thiết bị bếp<i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h3>Ấm siêu tốc</h3>
                                <a href="{{ route('products.amsieutoc')}}">Ấm đun nước siêu tốc KEE-8458</a>
                                <a href="{{ route('products.amsieutoc')}}">Ấm đun siêu tốc Smartcook 1.5L KES-3857</a>
                            </div>
                            <div class="column">
                                <h3>Bếp điện</h3>
                                <a href="{{ route('products.bepdien')}}">Bếp từ đơn</a>
                                <a href="{{ route('products.bepdien')}}">Bếp từ đôi</a>
                            </div>

                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Chăm sóc thiết bị<i class="fa-solid fa-caret-down"></i> </a>
                        <div class="dropdown-content">
                        <div class="column">
                                <h3>Máy sấy tóc</h3>
                                <a href="{{ route('products.maysaytoc')}}">Máy sấy tóc Elmich HDE-1823</a>
                                <a href="{{ route('products.maysaytoc')}}">Máy sấy tóc Elmich </a>
                            </div>
                            <div class="column">
                                <h3>Bàn chải điện</h3>
                                <a href="{{ route('products.banchai')}}">Bàn chải đánh răng điện Elmich Procare TBE-8453</a>
                                <a href="{{ route('products.banchai')}}">Bàn chải đánh răng điện Elmich53</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    </header>
    @yield('content')
</body>

</html>
