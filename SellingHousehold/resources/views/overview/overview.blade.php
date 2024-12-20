<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TRANG CHỦ')</title>
    <link rel="stylesheet" href="{{ asset('css/headerstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/overview.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
</head>
@if (Route::currentRouteName() !== 'login')
    @include('layouts.header')
@endif
@include('subheader.subheader')
<div class="services">
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_1.png') }}" alt=""> <b>FREESHIP</b>
        cho đơn
        hàng từ 1.000.000đ</div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_2.png') }}" alt=""> Hỗ trợ giao 4h nội
        thành
        HN/HCM theo nhu cầu</div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_3.png') }}" alt=""> Đổi trả trong 30
        ngày
    </div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_4.png') }}" alt=""> NHẬP MÃ YEUUNETI -
        Giảm 10% cho đơn hàng từ 800.000đ</div>
</div>
{{-- HIỂN THỊ CÁC SẢN PHẨM LIÊN QUAN --}}
<div class="related-products">
    <h2>DEAL DÀNH CHO BẠN</h2>
    <div class="product-grid">
        @if ($relatedProducts->count() > 0)
            @foreach ($relatedProducts as $product)
                <div class="product-card">
                    <div class="discount-rate-badge">
                        <p>Giảm {{ $product->discount }}%</p>
                    </div>
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}</p>
                    <p class="original-price"><span class="price">{{ number_format($product->price, 0, ',', '.') }}
                            VND</span></p>
                    <p><span class="discounted-price">{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}
                            VND</span></p>
                </div>
            @endforeach
        @else
            <p>Không có sản phẩm liên quan để hiển thị.</p>
        @endif
    </div>
</div>
{{-- HIỂn THỊ RA TẤT CẢ SẢN PHẨM --}}
<div class="product-list">
    <h2>Danh sách Sản Phẩm</h2>
    <div class="product-grid">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="product-card">
                    <div class="discount-rate-badge">
                        <p>Giảm {{ $product->discount }}%</p>
                    </div>
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    <h3>{{ $product->name }}</h3>
                    <!-- Shorten the description to 50 characters -->
                    <p>{{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}</p>

                    @if ($product->discount > 0)
                        <!-- Hiển thị giá gốc với gạch ngang -->
                        <p><span class="original-price"
                                style="text-decoration: line-through;">{{ number_format($product->price, 0, ',', '.') }}
                                VND</span></p>
                        <!-- Hiển thị giá sau giảm -->
                        <p><span class="discounted-price">{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}
                                VND</span></p>
                    @else
                        <!-- Hiển thị giá gốc mà không có gạch -->
                        <p><span class="original-price">{{ number_format($product->price, 0, ',', '.') }}
                                VND</span></p>
                    @endif

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="add-to-cart-btn">
                            <i class="fa-solid fa-cart-plus"></i> Mua ngay
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Không có sản phẩm nào để hiển thị.</p>
        @endif
    </div>
</div>
<br>

{{-- SHOW NOTIFY --}}
<div class="overlay" id="signupForm">
    <div class="notify-container">
        <button class="close-btn" onclick="closeForm()">✖</button>
        <center><img src="{{ asset('images/notify-img.png') }}" alt="logo" class="logo"></center>

        <form class="registration-form">
            <div class="success-info-customer">
                <div class="name-customer">
                    <label for="name">Tên của bạn*</label>
                    <input type="text" id="name" placeholder="">
                </div>

                <div class="phone-customer">
                    <label for="phone">Số điện thoại*</label>
                    <div class="phone-wrapper">
                        <span class="country-code"><img src="{{ asset('images/flag-VN.png') }}" alt="Vietnam Flag">
                            +84</span>
                        <input type="tel" id="phone" placeholder="">
                    </div>
                </div>
            </div>

            <label for="email">Email*</label>
            <input type="email" id="email" placeholder="">

            <div class="checkbox-container">
                <input type="checkbox" id="agreement">
                <label for="agreement">Bằng cách chọn hộp này, bạn đồng ý với Điều khoản sử dụng của chúng tôi và đồng ý
                    với <a href="#">Privacy Policy</a>*</label>
            </div>

            <button type="submit" class="submit-btn">Đăng ký nhận code</button>
        </form>

    </div>
</div>

<script>
    // Hàm hiển thị form khi tải trang
    window.onload = function() {
        setTimeout(function() {
            const overlay = document.getElementById("signupForm");
            overlay.classList.add('show'); 
        }, 800); 
    };

    // Hàm để đóng form
    function closeForm() {
        const overlay = document.getElementById("signupForm");
        overlay.classList.remove('show');
        setTimeout(() => {
            overlay.style.display = 'none'; 
        }, 400);
    }
</script>

<script>
    // success message
    @if (Session::has('success'))
        Notiflix.Notify.success("{{ Session::get('success') }}");
    @endif
    // error message 
    @if (Session::has('error'))
        Notiflix.Notify.error("{{ Session::get('error') }}");
    @endif
</script>
<br><br>
@if (Route::currentRouteName() !== 'login')
    @include('layouts.footer')
@endif
