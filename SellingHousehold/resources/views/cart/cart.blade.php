@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
<script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>

<div class="container-cart">
    <div class="promo-container">
        <p class="promo-text">ĐỪNG BỎ LỠ ƯU ĐÃI NÀY!</p>
        <p class="promo-description">
            Bạn chỉ còn thiếu 800.000 VND để được <span class="highlight">nhận voucher giảm thêm 10%</span>
        </p>
        <button class="buy-more-btn"><a href="{{ url('/overview') }}">MUA THÊM</a></button>
    </div>

    <div class="cart-container">
        <h3>GIỎ HÀNG</h3>
        {{-- Kiểm tra xem giỏ hàng có sản phẩm không --}}
        @if (empty($cart))
            <div class="empty-cart">
                <p>Không có sản phẩm nào. Quay lại <a href="{{ url('/overview') }}" class="store-link">cửa hàng</a> để
                    tiếp tục mua sắm.</p>
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
                            <th>Thao tác</th> {{-- Thêm cột thao tác --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $productId => $item)
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="{{ asset($item['image_url']) }}" alt="{{ $item['name'] }}">
                                        <span>{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td>{{ number_format($item['price']) }}đ</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST" class="quantity-form">
                                        @csrf
                                        <div class="quantity-input">
                                            <button type="button" class="quantity-btn decrease">-</button>
                                            <input type="number" name="quantities[{{ $productId }}]"
                                                value="{{ $item['quantity'] }}" min="0" max="100"
                                                data-unit-price="{{ $item['price'] }}">
                                            <button type="button" class="quantity-btn increase">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="total-price-cell"
                                    data-total="{{ number_format($item['price'] * $item['quantity']) }}">
                                    {{ number_format($item['price'] * $item['quantity']) }}đ
                                </td>
                                <td>
                                    <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Xoá</button>
                                    </form>
                                </td>
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

<script>
    // success message
    @if (Session::has('success'))
        Notiflix.Notify.success("{{ Session::get('success') }}");
    @endif
    // error message 
    @if (Session::has('error'))
        Notiflix.Notify.error("{{ Session::get('error') }}");
    @endif

    document.addEventListener('DOMContentLoaded', function() {
        const quantityForms = document.querySelectorAll('.quantity-form');

        quantityForms.forEach(form => {
            const input = form.querySelector('input[type="number"]');
            const totalPriceCell = form.closest('tr').querySelector(
            '.total-price-cell'); // Sửa lại lớp ở đây

            function updateTotalPrice() {
                const unitPrice = parseFloat(input.dataset.unitPrice);
                const quantity = parseInt(input.value) || 0; // Đảm bảo giá trị số
                const totalPrice = unitPrice * quantity;

                totalPriceCell.textContent = `${totalPrice.toLocaleString()}đ`; // Cập nhật tổng tiền
            }

            // Sự kiện khi giảm số lượng
            form.querySelector('.decrease').addEventListener('click', function() {
                if (parseInt(input.value) > 0) {
                    input.value = parseInt(input.value) - 1;
                    updateTotalPrice(); // Cập nhật tổng tiền
                }
            });

            // Sự kiện khi tăng số lượng
            form.querySelector('.increase').addEventListener('click', function() {
                input.value = parseInt(input.value) + 1;
                updateTotalPrice(); // Cập nhật tổng tiền
            });

            // Ngăn chặn hành động mặc định của form
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Ngăn chặn trang refresh
                // Logic gửi yêu cầu cập nhật tới server nếu cần
            });

            updateTotalPrice(); // Cập nhật tổng tiền ban đầu
        });
    });
</script>
@include('layouts.footer')
