<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
<title>UNETIHOUSEHOLD.COM | THANH TOÁN ĐƠN HÀNG</title>
<link rel="shortcut icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
<script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
<div class="checkout-container">
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <!-- Customer Information Section -->
        <div class="container-totals-pays">
            <div class="info-customer">
                <div class="logo-unetihousehold">
                    <center><img src="{{ asset('images/logo-ver-color.png') }}" alt=""></center>
                </div>
                <div class="checkout-container-shop">
                    <div class="form-info-check-products">
                        <h2>Thông tin nhận hàng</h2>

                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và tên:</label><br>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('full_name', $user->full_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label><br>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ old('phone', $user->phone_number) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ:</label><br>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ old('address', $user->address) }}" required>
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
                            <h2>Vận chuyển</h2>
                            <p>Vui lòng nhập thông tin giao hàng</p>
                        </div>
                        <h2>Thanh toán</h2>
                        <div class="form-sub-group">
                            <div class="form-group-pays">
                                <input type="radio" name="payment_method" value="vnpay" id="vnpay" required>
                                <label for="vnpay">Thanh toán bằng VNPAY</label>
                            </div>

                            <div class="form-group-pays">
                                <input type="radio" name="payment_method" value="onepay_visa" id="onepay_visa"
                                    required>
                                <label for="onepay_visa">OnePay - Thanh toán bằng thẻ quốc tế (Visa/MasterCard)</label>
                            </div>

                            <div class="form-group-pays">
                                <input type="radio" name="payment_method" value="onepay_atm" id="onepay_atm" required>
                                <label for="onepay_atm">OnePay - Thanh toán online qua thẻ nội địa (ATM)</label>
                            </div>

                            <div class="form-group-pays">
                                <input type="radio" name="payment_method" value="cod" id="cod" required>
                                <label for="cod">Thanh toán khi giao hàng (COD)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <div class="order-checkout">
                    <h3>Đơn hàng ({{ $totalQuantity }} sản phẩm)</h3>
                    <ul>
                        @foreach ($cartItems as $item)
                            @php
                                // Tính giá sau giảm giá
                                $priceAfterDiscount = $item['price'] * (1 - ($item['discount'] ?? 0) / 100);
                            @endphp
                            <li>
                                <img src="{{ $item->image_url }}" alt="">
                                {{ $item->name }}
                                <span class="item-total" data-price="{{ $priceAfterDiscount }}"
                                    data-quantity="{{ $item->quantity }}">
                                    {{ number_format($priceAfterDiscount * $item->quantity, 0, ',', '.') }}đ
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <hr>
                <div class="total-checkout">
                    <p><strong>Tổng cộng: {{ number_format($totalPrice, 0) }}đ</strong></p>
                    <div class="form-group-submit">
                        <button type="submit" class="btn-submit">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    // success message
    @if (Session::has('success'))
        Notiflix.Notify.success("{{ Session::get('success') }}");
    @endif
    // error message 
    @if (Session::has('error'))
        Notiflix.Notify.error("{{ Session::get('error') }}");
    @endif

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
