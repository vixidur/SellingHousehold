<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title', 'THÔNG TIN CÁ NHÂN')</title>
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
<link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
@if ($user)
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    @include('admin.layouts.nav')
    @include('admin.layouts.headeradmin')

    <div class="myprofile">
        <div class="myprofile-form">
            <form method="post" action="{{ route('myprofile.update') }}">
                @csrf
                <!-- Avatar section -->
                <div class="avatar-section">
                    <img src="{{ $user->picture_url ?? asset('images/default-avatar.png') }}" alt="My avatar"
                        class="avatar">
                    <div class="avatar-input">
                        <label for="picture_url">Link Ảnh: </label>
                        <input type="text" name="picture_url" id="picture_url" value="{{ $user->picture_url }}"
                            placeholder="VD: https://example.com/my-avatar.jpg">
                    </div>
                </div>

                <!-- Information section -->
                <div class="information-section">
                    <h3>Thông tin cá nhân</h3>
                    <div class="row">
                        <div class="col">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" name="fullname" id="fullname" value="{{ $user->full_name }}"
                                placeholder="VD: Trần Văn Chiến" required>
                        </div>
                        <div class="col">
                            <label for="emailaddress">Email</label>
                            <input type="email" name="emailaddress" id="emailaddress" value="{{ $user->email }}"
                                placeholder="VD: user@gmail.com" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="username">Tài khoản</label>
                            <input type="text" name="username" id="username" value="{{ $user->username }}" readonly>
                        </div>
                        <div class="col">
                            <label for="phonenumber">Số điện thoại</label>
                            <input type="text" name="phonenumber" id="phonenumber" value="{{ $user->phone_number }}"
                                placeholder="VD: +84 67235914" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="{{ $user->address }}"
                                placeholder="VD: 294/11 Đường Lĩnh Nam" required>
                        </div>
                    </div>
                </div>

                <!-- Change Password section -->
                <div class="changePassword">
                    <h3>Thay đổi mật khẩu</h3>
                    <div class="row">
                        <div class="col">
                            <label for="pass">Mật khẩu cũ</label>
                            <div class="password-field">
                                <input type="password" name="pass" id="pass" required>
                                <span class="toggle-password" onclick="togglePassword('pass', this)">SHOW</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="newpass">Mật khẩu mới</label>
                            <div class="password-field">
                                <input type="password" name="newpass" id="newpass">
                                <span class="toggle-password" onclick="togglePassword('newpass', this)">SHOW</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-buttons">
                    <button type="submit" class="btn-save">SAVE</button>
                </div>
            </form>
        </div>
    </div>
    @include('admin.layouts.footeradmin')
@else
    <p>Xin vui lòng đăng nhập để truy cập trang này.</p>
@endif

<script>
    function togglePassword(inputId, toggleElement) {
        const inputField = document.getElementById(inputId);
        if (inputField.type === 'password') {
            inputField.type = 'text';
            toggleElement.textContent = 'HIDE'; // Change text to HIDE
        } else {
            inputField.type = 'password';
            toggleElement.textContent = 'SHOW'; // Change text to SHOW
        }
    }
</script>
