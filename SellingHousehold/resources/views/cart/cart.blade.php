@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<div class="container-cart">
<div class="promo-container">
    <p class="promo-text">ĐỪNG BỎ LỠ ƯU ĐÃI NÀY!</p>
    <p class="promo-description">
        Bạn chỉ còn thiếu 800.000 VND để được <span class="highlight">nhận voucher giảm thêm 10%</span>
    </p>
    <button class="buy-more-btn">MUA THÊM</button>
</div>

<div class="cart-container">
    <h3>GIỎ HÀNG</h3>
    <div class="empty-cart">
        <p>Không có sản phẩm nào. Quay lại <a href="#" class="store-link">cửa hàng</a> để tiếp tục mua sắm.</p>
    </div>
</div>
<div class="product-section">
    <h2>MUA NGAY ĐỂ NHẬN ƯU ĐÃI</h2>
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

        <div class="product-card">
            <div class="discount">Giảm 50%</div>
            <img src="https://s.net.vn/Sp2x" alt="Cốc giữ nhiệt inox">
            <h3>Cốc giữ nhiệt inox 304 Elmich EL8312 dung tích 600ml - Xanh</h3>
            <p class="price">
                249.000đ <span class="old-price">400.000đ</span>
            </p>
            <button class="add-to-cart">
                <i class="fa fa-cart-plus"></i>
            </button>
        </div>
    </div>
</div>
</div>
@include('layouts.footer')
