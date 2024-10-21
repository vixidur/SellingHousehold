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

        {{-- THÔNG BÁO --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Kiểm tra xem giỏ hàng có sản phẩm không --}}
        @if (empty($cart))
            <div class="empty-cart">
                <p>Không có sản phẩm nào. Quay lại <a href="{{ url('/') }}" class="store-link">cửa hàng</a> để tiếp
                    tục mua sắm.</p>
            </div>
        @else
            {{-- CÁC LOẠI SẢN PHẨM KHI ĐƯỢC THÊM VÀO GIỎ HÀNG --}}
            <div class="all-products-in-shopping-cart">
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $productId => $item)
                            <tr>
                                <td>
                                    <img src="{{ asset($item['image_url']) }}" alt="{{ $item['name'] }}">
                                    {{ $item['name'] }}
                                </td>
                                <td>{{ number_format($item['price']) }}đ</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantities[{{ $productId }}]"
                                            value="{{ $item['quantity'] }}" min="0" max="100">
                                        <button type="submit">Cập nhật</button>
                                    </form>
                                </td>
                                <td>{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="payment">
                <p><a href="{{ route('cart.checkout') }}">Tiến hành thanh toán</a></p>
            </div>
        @endif
    </div>
</div>
@include('layouts.footer')
