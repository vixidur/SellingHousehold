@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/info.css') }}">
<div class="info">
    <div class="store2">
        <div class="store-stats">
            <div class="store1">
                <h2>Hệ thống cửa hàng</h2>
            </div>
            <div class="box">
                <div class="stat-box orange">
                    <h3>Showroom</h3>
                    <p>30+</p>
                </div>
                <div class="stat-box blue">
                    <h3>Cửa hàng, siêu thị</h3>
                    <p>10000+</p>
                </div>
                <div class="stat-box purple">
                    <h3>Nhân sự</h3>
                    <p>700+</p>
                </div>
            </div>
        </div>
    </div>
    <div class="store-map">
        <div class="store-locator">
            <div class="city">
                <label for="city">Chọn Tỉnh/Thành Phố</label> <br>
                <select id="city">
                    <option value="hanoi">Hà Nội</option>
                    <option value="thainguyen">Thái Nguyên</option>
                    <option value="haiphong">Hải Phòng</option>
                </select>
            </div>
            <div class="store-list">
                <div class="store">
                    <h3>Unetihousehold Vincom Royal City</h3>
                    <p><strong>Mail:</strong> cskh@Unetihousehold.vn</p>
                    <p><strong>Hotline:</strong> 0934266553</p>
                    <p>Đ/c: Lô R2-B3-K1-K2, Tầng B2 TTTM Vincom...</p>
                </div>

                <div class="store">
                    <h3>Unetihousehold Xuân La</h3>
                    <p><strong>Mail:</strong> cskh@Unetihousehold.vn</p>
                    <p><strong>Hotline:</strong> 0374902888</p>
                    <p>Đ/c: Số 33 Xuân La, Tây Hồ...</p>
                </div>

                <div class="store">
                    <h3>Unetihousehold Nguyễn Lương Bằng</h3>
                    <p><strong>Mail:</strong> cskh@Unetihousehold.vn</p>
                    <p><strong>Hotline:</strong> 02435134657</p>
                    <p>Đ/c: Số 131 Nguyễn Lương Bằng...</p>
                </div>
                <div class="store">
                    <h3>Unetihousehold Lĩnh Nam</h3>
                    <p><strong>Mail:</strong> cskh@Unetihousehold.vn</p>
                    <p><strong>Hotline:</strong> 02435124386</p>
                    <p>Đ/c: Số 218 Lĩnh Nam...</p>
                </div>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.238063611474!2d105.87368777529977!3d20.983092180654776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aea00c96b6c1%3A0x8e95712f0f470a2c!2zMjE4IMSQLiBMxKluaCBOYW0sIFbEqW5oIEjGsG5nLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1729784142626!5m2!1svi!2s"
                width="800" height="500" style="border:0;border-radius: 10px;margin-left: 15%;margin-top:15%;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@include('layouts.footer')
