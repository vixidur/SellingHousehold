<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đặt Hàng</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>

<body>
    <div class="container">
        <header>
            <img src="{{ asset('images/logo-ver-color.png') }}" alt="Elmich Logo" class="logo">
            {{-- <div class="user-actions">
                <a href="#">Đăng xuất</a>
            </div> --}}
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
                        <img src="{{ asset('images/flag-VN.png') }}" alt="Vietnam Flag" class="flag-icon">
                    </div>

                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" placeholder="Địa chỉ">

                    <label for="province">Tỉnh thành</label>
                    <select id="province" name="province">
                        <option value="">---</option>
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Hà Giang">Hà Giang</option>
                        <option value="Cao Bằng">Cao Bằng</option>
                        <option value="Bắc Kạn">Bắc Kạn</option>
                        <option value="Tuyên Quang">Tuyên Quang</option>
                        <option value="Lào Cai">Lào Cai</option>
                        <option value="Điện Biên">Điện Biên</option>
                        <option value="Lai Châu">Lai Châu</option>
                        <option value="Sơn La">Sơn La</option>
                        <option value="Yên Bái">Yên Bái</option>
                        <option value="Hòa Bình">Hòa Bình</option>
                        <option value="Thái Nguyên">Thái Nguyên</option>
                        <option value="Lạng Sơn">Lạng Sơn</option>
                        <option value="Quảng Ninh">Quảng Ninh</option>
                        <option value="Bắc Giang">Bắc Giang</option>
                        <option value="Phú Thọ">Phú Thọ</option>
                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                        <option value="Bắc Ninh">Bắc Ninh</option>
                        <option value="Hải Dương">Hải Dương</option>
                        <option value="Hải Phòng">Hải Phòng</option>
                        <option value="Hưng Yên">Hưng Yên</option>
                        <option value="Thái Bình">Thái Bình</option>
                        <option value="Hà Nam">Hà Nam</option>
                        <option value="Nam Định">Nam Định</option>
                        <option value="Ninh Bình">Ninh Bình</option>
                        <option value="Thanh Hóa">Thanh Hóa</option>
                        <option value="Nghệ An">Nghệ An</option>
                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                        <option value="Quảng Bình">Quảng Bình</option>
                        <option value="Quảng Trị">Quảng Trị</option>
                        <option value="Thừa Thiên-Huế">Thừa Thiên-Huế</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                        <option value="Quảng Nam">Quảng Nam</option>
                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                        <option value="Bình Định">Bình Định</option>
                        <option value="Phú Yên">Phú Yên</option>
                        <option value="Khánh Hòa">Khánh Hòa</option>
                        <option value="Ninh Thuận">Ninh Thuận</option>
                        <option value="Bình Thuận">Bình Thuận</option>
                        <option value="Kon Tum">Kon Tum</option>
                        <option value="Gia Lai">Gia Lai</option>
                        <option value="Đắk Lắk">Đắk Lắk</option>
                        <option value="Đắk Nông">Đắk Nông</option>
                        <option value="Lâm Đồng">Lâm Đồng</option>
                        <option value="Bình Phước">Bình Phước</option>
                        <option value="Tây Ninh">Tây Ninh</option>
                        <option value="Bình Dương">Bình Dương</option>
                        <option value="Đồng Nai">Đồng Nai</option>
                        <option value="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option>
                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                        <option value="Long An">Long An</option>
                        <option value="Tiền Giang">Tiền Giang</option>
                        <option value="Bến Tre">Bến Tre</option>
                        <option value="Trà Vinh">Trà Vinh</option>
                        <option value="Vĩnh Long">Vĩnh Long</option>
                        <option value="Đồng Tháp">Đồng Tháp</option>
                        <option value="An Giang">An Giang</option>
                        <option value="Kiên Giang">Kiên Giang</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                        <option value="Hậu Giang">Hậu Giang</option>
                        <option value="Sóc Trăng">Sóc Trăng</option>
                        <option value="Bạc Liêu">Bạc Liêu</option>
                        <option value="Cà Mau">Cà Mau</option>

                    </select>

                    <label for="district">Quận huyện</label>
                    <select id="district" name="district">
                        <option value="">---</option>
                        <!-- Thêm các tùy chọn quận huyện -->
                    </select>

                    <label for="ward">Phường xã</label>
                    <input type="text" id="ward" name="ward">

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
                    <div class="payment-options1">
                        <div class="content">
                            <input type="radio" id="vnpay" name="payment" value="vnpay" required>
                            <label for="vnpay">Thanh toán bằng ví VNPAY, thẻ VISA, thẻ nội địa</label>
                        </div>
                        <div class="img">
                            <img src="{{ asset('images/vnpay_qr.png') }}" alt="">
                        </div>
                    </div>
                    <div class="payment-options2">
                        <div class="content">
                            <input type="radio" id="onepay_visa" name="payment" value="onepay_visa">
                            <label for="onepay_visa">OnePay - Thanh toán quốc tế (Visa/MasterCard)</label>
                        </div>
                        <div class="img">
                            <img src="{{ asset('images/logo-onepay.png') }}" alt="">
                        </div>
                    </div>

                    <div class="payment-options3">
                        <div class="content">
                            <input type="radio" id="onepay_atm" name="payment" value="onepay_atm">
                            <label for="onepay_atm">OnePay - Thanh toán nội địa (ATM)</label>
                        </div>
                        <div class="img">
                            <img src="{{ asset('images/logo-onepay.png') }}" alt="">
                        </div>
                    </div>

                    <div class="payment-options4">
                        <div class="content">
                            <input type="radio" id="cod" name="payment" value="cod">
                            <label for="cod">Thanh toán khi giao hàng (COD)</label>
                        </div>
                        <div class="img">
                            <img src="{{ asset('images/dollar.png') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>

            <div class="right-section">
                <h3>Đơn hàng (1 sản phẩm)</h3>
                <div class="product">
                    <span class="product-name">Bếp từ Elmich ICE-3496</span>
                    <span class="product-price">3.590.000đ</span>
                </div>

                <div class="discount-code">
                    <input type="text" id="discount" name="discount" placeholder="Nhập mã giảm giá">
                    <button class="apply-btn">Áp dụng</button>
                </div>

                <div class="order-summary">
                    <p>Tạm tính: <span>3.590.000đ</span></p>
                    <p>Phí vận chuyển: <span>-</span></p>
                    <p>Tổng cộng: <span>3.590.000đ</span></p>
                </div>

                <div class="order-actions">
                    <a href="#" class="back-link"><i class="fa-solid fa-chevron-left"></i> Quay về giỏ hàng</a>
                    <button class="order-btn">Đặt hàng</button>
                </div>
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
