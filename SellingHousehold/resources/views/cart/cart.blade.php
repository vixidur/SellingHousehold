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
        <div class="buy-more-btn-cart">
            <a href="{{ url('/overview') }}" class="buy-more-btn">MUA THÊM</a>
        </div>
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
                            @php
                                $priceAfterDiscount = $item['price'] * (1 - ($item['discount'] ?? 0) / 100);
                            @endphp
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="{{ asset($item['image_url']) }}" alt="{{ $item['name'] }}">
                                        <span>{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td>{{ number_format($priceAfterDiscount, 0, ',', '.') }}đ</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST" class="quantity-form">
                                        @csrf
                                        <div class="quantity-input">
                                            <button type="button" class="quantity-btn decrease">-</button>
                                            <input type="number" name="quantities[{{ $productId }}]"
                                                value="{{ $item['quantity'] }}" min="0" max="100"
                                                data-unit-price="{{ $priceAfterDiscount }}"
                                                class="quantity-input-field">
                                            <button type="button" class="quantity-btn increase">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="total-price-cell"
                                    data-price="{{ number_format($priceAfterDiscount * $item['quantity'], 0, ',', '.') }}">
                                    {{ number_format($priceAfterDiscount * $item['quantity'], 0, ',', '.') }}đ
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
                <form action="{{ route('cart.checkout') }}" method="GET" class="quantity-form">
                    <p>Tổng tiền: <span id="total-cart-price">{{ number_format($totalPrice ?? 0, 0) }}đ</span></p>
                    @csrf

                    @foreach ($cart as $productId => $item)
                        <input type="hidden" name="quantities[{{ $productId }}]" value="{{ $item['quantity'] }}">
                    @endforeach

                    <button type="submit" class="checkout-button custom-btn">Tiến hành thanh toán</button>
                </form>
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

    document.querySelectorAll('.quantity-form').forEach(form => {
        const quantityInput = form.querySelector('.quantity-input-field');
        const unitPrice = parseFloat(quantityInput.dataset.unitPrice);
        const totalPriceCell = form.closest('tr').querySelector('.total-price-cell');

        // Hàm cập nhật tổng tiền cho sản phẩm
        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value) || 0; // Đảm bảo giá trị số
            const totalPrice = unitPrice * quantity; // Tính tổng
            totalPriceCell.textContent = `${totalPrice.toLocaleString()}đ`; // Cập nhật tổng tiền cho sản phẩm
            totalPriceCell.setAttribute('data-price',
            totalPrice); // Lưu giá vào thuộc tính để dễ tính toán tổng giỏ hàng
            updateCartTotal(); // Cập nhật tổng giỏ hàng
        }

        // Cập nhật tổng giỏ hàng
        function updateCartTotal() {
            let cartTotal = 0;
            document.querySelectorAll('.total-price-cell').forEach(cell => {
                const price = parseFloat(cell.getAttribute('data-price').replace(/\./g, '').replace('đ',
                    '')) || 0; // Lấy giá trị từ thuộc tính
                cartTotal += price; // Cộng dồn vào tổng giỏ hàng
            });
            document.getElementById('total-cart-price').textContent =
            `${cartTotal.toLocaleString()}đ`; // Cập nhật tổng giỏ hàng
        }

        // Sự kiện nhấp vào nút tăng
        form.querySelector('.increase').addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1; // Tăng số lượng
            updateTotalPrice(); // Cập nhật tổng
        });

        // Sự kiện nhấp vào nút giảm
        form.querySelector('.decrease').addEventListener('click', () => {
            if (quantityInput.value > 0) {
                quantityInput.value = parseInt(quantityInput.value) - 1; // Giảm số lượng
                updateTotalPrice(); // Cập nhật tổng
            }
        });

        // Cập nhật tổng khi nhập trực tiếp vào ô input
        quantityInput.addEventListener('input', () => {
            if (!isNaN(quantityInput.value) && quantityInput.value >= 0) {
                updateTotalPrice(); // Cập nhật tổng
            } else {
                quantityInput.value = 0; // Đặt lại giá trị nếu không hợp lệ
                updateTotalPrice(); // Cập nhật tổng
            }
        });

        // Gọi hàm cập nhật ngay khi load trang
        updateTotalPrice();
    });
</script>
@include('layouts.footer')
