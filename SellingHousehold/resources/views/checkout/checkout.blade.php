<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
<title>UNETIHOUSEHOLD.COM | THANH TOÁN ĐƠN HÀNG</title>
<link rel="shortcut icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon">
<div class="checkout-container">
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <!-- Customer Information Section -->
        <div class="test2">
            <div class="test3">
                <div class="logo-unetihousehold">
                    <img src="{{ asset('images/logo-ver-color.png') }}" alt="">
                </div>
                <div class="checkout-container-shop">
                    <div class="form-info-check-products">
                        <h4>Thông tin nhận hàng</h4>

                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $user['email'] ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và tên:</label><br>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $user['name'] ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label><br>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ $user['phone'] ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ:</label><br>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $user['address'] ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="city">Tỉnh/Thành phố:</label><br>
                            <select name="city" id="city" class="form-control">
                                <option value="" selected>Chọn tỉnh thành</option>
                                <!-- Thêm các tỉnh thành vào đây nếu cần -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="district">Quận/Huyện:</label><br>
                            <select name="district" id="district" class="form-control">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ward">Phường/Xã:</label><br>
                            <select name="ward" id="ward" class="form-control">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </div>
                    </div>
                    <!-- Payment Method Section -->
                    <div class="form-method-proceed-cart">
                        <div class="info-vanchuyen">
                            <h3>Vận chuyển</h3>
                            <h3>Vui lòng nhập thông tin giao hàng</h3>
                        </div>
                        <div class="form-sub-group">
                            <h4>Thành toán</h4>

                            <div class="form-group">
                                <input type="radio" name="payment_method" value="vnpay" id="vnpay">
                                <label for="vnpay">Thanh toán bằng VNPAY</label>
                            </div>

                            <div class="form-group">
                                <input type="radio" name="payment_method" value="onepay_visa" id="onepay_visa">
                                <label for="onepay_visa">OnePay - Thanh toán bằng thẻ quốc tế (Visa/MasterCard)</label>
                            </div>

                            <div class="form-group">
                                <input type="radio" name="payment_method" value="onepay_atm" id="onepay_atm">
                                <label for="onepay_atm">OnePay - Thanh toán online qua thẻ nội địa (ATM)</label>
                            </div>

                            <div class="form-group">
                                <input type="radio" name="payment_method" value="cod" id="cod">
                                <label for="cod">Thanh toán khi giao hàng (COD)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-summary">
                <h3>Đơn hàng ({{ array_sum(array_column($cart, 'quantity')) }} sản phẩm)</h3>
                <ul>
                    @foreach ($cart as $productId => $product)
                        @php
                            // Tính giá sau giảm giá
                            $priceAfterDiscount = $product['price'] * (1 - ($product['discount'] ?? 0) / 100);
                        @endphp
                        <li>
                            <img src="{{ $product['image_url'] }}" alt="">
                            {{ $product['name'] }}
                            <span class="item-total" data-price="{{ $priceAfterDiscount }}"
                                data-quantity="{{ $product['quantity'] }}">
                                {{ number_format($priceAfterDiscount * $product['quantity'], 0, ',', '.') }}đ
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="total-checkout">
                    <p><strong>Tổng cộng:</strong> <span id="total-price">{{ number_format($totalPrice, 0) }}đ</span>
                    </p>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary Section -->
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>
