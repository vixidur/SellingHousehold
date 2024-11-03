@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<div class="header">
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_1.png') }}" alt=""> <b>FREESHIP</b> cho đơn
        hàng từ 1.000.000đ</div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_2.png') }}" alt=""> Hỗ trợ giao 4h nội thành
        HN/HCM theo nhu cầu</div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_3.png') }}" alt=""> Đổi trả trong 30 ngày
    </div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_4.png') }}" alt=""> NHẬP MÃ YEUUNETI -
        Giảm 10% cho đơn hàng từ 800.000đ</div>
</div>
<div class="product-section">
        <h2>CÁC SẢN PHẨM: DỤNG CỤ BẾP !</h2>
        <div class="product-container">
            <div class="product-card">
                <div class="discount">Giảm 50%</div>
                <img src="{{ asset(path: 'images/Products/hopnhua1.png') }}" alt="Product 3">
                <h3>Hộp nhựa đa năng Elmich Diamond EL8406</h3>
                <p class="price">
                <span class="new-price">475.000đ</span>
                <span class="old-price">790.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 40%</div>
                <img src="{{ asset(path: 'images/Products/hopnhua2.png') }}" alt="Product 3">
                <h3>Hộp nhựa đa năng Elmich Ultra Sharp EL8424</h3>
                <p class="price">
                <span class="new-price">246.000đ</span>
                <span class="old-price">450.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 41%</div>
                <img src="{{ asset(path: 'images/Products/hopnhua3.png') }}" alt="Product 3">
                <h3>Hộp nhựa đa năng Elmich Ultra Sharp EL8424</h3>
                <p class="price">
                <span class="new-price">256.000đ</span>
                <span class="old-price">690.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 46%</div>
                <img src="{{ asset(path: 'images/Products/hopnhua4.png') }}" alt="Product 3">
                <h3>Hộp nhựa đa năng Elmich EL8424</h3>
                <p class="price">
                <span class="new-price">179.000đ</span>
                <span class="old-price">300.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>
        </div>
    </div>
<div class="product-section">
        <h2>CÁC SẢN PHẨM CÓ LIÊN QUAN</h2>
        <div class="product-container">
            <div class="product-card">
                <div class="discount">Giảm 50%</div>
                <img src="{{ asset(path: 'images/Products/hopcom3.png') }}" alt="Product 3">
                <h3>Hộp cơm giữ nhiệt inox 304 Elmich EL8302 dung tích 1.7L</h3>
                <p class="price">
                    795.000đ <span class="old-price">1.600.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 40%</div>
                <img src="{{ asset(path: 'images/Products/noinaucham.png') }}" alt="Product 3">
                <h3>Nồi nấu chậm Elmich 1L SCE-8524OL - Trắng</h3>
                <p class="price">
                    599.000đ <span class="old-price">900.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 41%</div>
                <img src="{{ asset(path: 'images/Products/chao.png') }}" alt="Product 3">
                <h3>Chảo nguyên khối sâu lòng inox 304 cao cấp Trimax EL...</h3>
                <p class="price">
                    529.000đ <span class="old-price">800.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 46%</div>
                <img src="{{ asset(path: 'images/Products/batupmi.png') }}" alt="Product 3">
                <h3>BÁT ÚP MÌ INOX 304 ELMICH EL8314 DUNG TÍCH 1.35L...</h3>
                <p class="price">
                    135.000đ <span class="old-price">250.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>
        </div>
</div>
@include('layouts.footer')