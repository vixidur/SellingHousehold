<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đặt Hàng</title>
    <link rel="stylesheet" href="{{asset('css/payment.css')}}">
</head>
<body>
    <div class="container">
        <header>
            <img src="elmich-logo.png" alt="Elmich Logo" class="logo">
            <div class="user-actions">
                <a href="#">Đăng xuất</a>
            </div>
        </header>

        <div class="main-content">
            <div class="left-section">
                <h3>Thông tin nhận hàng</h3>
                <form action="" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="tranvanchien24022003@gmail.com" required>

                    <label for="fullname">Họ và tên</label>
                    <input type="text" id="fullname" name="fullname" value="TRAN VAN CHIEN" required>

                    <label for="phone">Số điện thoại</label>
                    <div class="phone-input">
                        <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" required>
                        <img src="vietnam-flag.png" alt="Vietnam Flag" class="flag-icon">
                    </div>

                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" placeholder="Địa chỉ">

                    <label for="province">Tỉnh thành</label>
                    <select id="province" name="province">
                        <option value="">---</option>
                        <!-- Thêm các tùy chọn tỉnh thành -->
                    </select>

                    <label for="district">Quận huyện</label>
                    <select id="district" name="district">
                        <option value="">---</option>
                        <!-- Thêm các tùy chọn quận huyện -->
                    </select>

                    <label for="ward">Phường xã</label>
                    <input type="text" id="ward" name="ward" placeholder="Phường xã">

                    <label for="note">Ghi chú (tùy chọn)</label>
                    <textarea id="note" name="note"></textarea>
                </form>
            </div>

            <div class="center-section">
                <h3>Vận chuyển</h3>
                <select name="shipping_method" id="shipping_method">
                    <option value="">Vui lòng nhập thông tin giao hàng</option>
                    <!-- Các tùy chọn vận chuyển -->
                </select>

                <h3>Thanh toán</h3>
                <div class="payment-options">
                    <input type="radio" id="vnpay" name="payment" value="vnpay" required>
                    <label for="vnpay">Thanh toán bằng ví VNPAY, thẻ VISA, thẻ nội địa</label>

                    <input type="radio" id="onepay_visa" name="payment" value="onepay_visa">
                    <label for="onepay_visa">OnePay - Thanh toán quốc tế (Visa/MasterCard)</label>

                    <input type="radio" id="onepay_atm" name="payment" value="onepay_atm">
                    <label for="onepay_atm">OnePay - Thanh toán nội địa (ATM)</label>

                    <input type="radio" id="cod" name="payment" value="cod">
                    <label for="cod">Thanh toán khi giao hàng (COD)</label>
                </div>
            </div>

            <div class="right-section">
                <h3>Đơn hàng (1 sản phẩm)</h3>
                <div class="product">
                    <span class="product-name">Bếp từ Elmich ICE-3496</span>
                    <span class="product-price">3.590.000đ</span>
                </div>

                <input type="text" id="discount" name="discount" placeholder="Nhập mã giảm giá">
                <button class="apply-btn">Áp dụng</button>

                <div class="order-summary">
                    <p>Tạm tính: <span>3.590.000đ</span></p>
                    <p>Phí vận chuyển: <span>-</span></p>
                    <p>Tổng cộng: <span>3.590.000đ</span></p>
                </div>

                <a href="cart.php" class="back-link">Quay về giỏ hàng</a>
                <button class="order-btn">Đặt hàng</button>
            </div>
        </div>

        <footer>
            <a href="#">Chính sách hoàn trả</a>
            <a href="#">Chính sách bảo mật</a>
            <a href="#">Điều khoản sử dụng</a>
            <p>Liên hệ hỗ trợ đặt hàng: <span>0901570440</span></p>
        </footer>
    </div>
</body>
</html>
