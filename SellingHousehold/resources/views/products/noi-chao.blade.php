
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <div class="product-section">
        <h2>CÁC SẢN PHẨM: NỒI - CHẢO !</h2>
        <div class="product-container">
            <div class="product-card">
                <div class="discount">Giảm 50%</div>
                <img src="{{ asset('images/Products/product4.png') }}" alt="Product 1">
                <h3>Bộ nồi inox nguyên khối Elmich Trimax</h3>
                <p class="price">
                <span class="new-price">2.375.000đ</span>
                <span class="old-price">3.390.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 40%</div>
                <img src="{{ asset('images/Products/product3.png') }}" alt="Product 3">
                <h3>Nồi men sứ Elmich Hera II EL-5203GY size 18-24cm</h3>
                <p class="price">
                <span class="new-price">679.000đ</span>
                <span class="old-price">1.000.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 41%</div>
                <img src="{{ asset('images/Products/product2.png') }}" alt="Product 2">
                <h3>Bộ nồi inox nguyên khối Elmich Trimax classic</h3>
                <p class="price">
                <span class="new-price">1.856.000đ</span>
                <span class="old-price">3.090.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>

            <div class="product-card">
                <div class="discount">Giảm 46%</div>
                <img src="{{ asset('images/Products/product3.png') }}" alt="Product 3">
                <h3>Nồi men sứ Elmich Hera II EL-5203GY size 18-24cm</h3>
                <p class="price">
                <span class="new-price">679.000đ</span>
                <span class="old-price">1.000.000đ</span>
                </p>
                <button class="add-to-cart">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="product-section">
        <h2>CÁC SẢN PHẨM CÓ LIÊN QUAN</h2>
        <div class="product-container">
            <div class="product-card">
                <div class="discount">Giảm 50%</div>
                <img src="https://s.net.vn/eh6U" alt="Hộp cơm giữ nhiệt">
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
                <img src="https://s.net.vn/w3et" alt="Nồi nấu chậm Elmich 1L">
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
                <img src="https://s.net.vn/UY9D" alt="Chảo nguyên khối inox">
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
                <img src="https://s.net.vn/Z5dD" alt="Bát úp mì inox">
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
</div>
@include('layouts.footer')

