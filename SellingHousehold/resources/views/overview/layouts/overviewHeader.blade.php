<link rel="icon" href="{{ asset('images/logo-web.png') }}" type="image/x-icon" />
<header>
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="UNETI HOUSEHOLD LOGO" width="180px" height="70px">
                </a>
            </div>
            <div class="system-shop">
                <a href="{{ url('/info-shop') }}">Hệ thống cửa hàng</a>
            </div>
            <div class="search-products">
                <div class="search-wrapper">
                    <input type="text" name="search-products" class="search-items" placeholder="Tìm kiếm sản phẩm">
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
                    <a href="{{ route('cart') }}">Gio Hang</a>
                </div>
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
