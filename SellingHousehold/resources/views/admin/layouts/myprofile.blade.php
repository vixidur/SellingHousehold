<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
<div class="container">
    @include('admin.layouts.nav')
    @include('admin.layouts.headeradmin')
    <div class="myprofile">
        <div class="myprofile-form">
            <form method="post">
                <!-- Avatar section -->
                <div class="img">
                    <img src="#" alt="My avatar" class="avatar">
                    <div class="avatar-buttons">
                        <button type="button">Change Image</button>
                        <button type="button">Edit Image</button>
                    </div>
                </div>
    
                <!-- Information section -->
                <div class="information">
                    <div class="row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="VD: Chiến">
                        </div>
                        <div class="col">
                            <label for="fullname">Full Name</label>
                            <input type="text" name="fullname" id="fullname" placeholder="VD: Trần Văn Chiến">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col">
                            <label for="emailaddress">Email Address</label>
                            <input type="text" name="emailaddress" id="emailaddress" placeholder="VD: user@gmail.com">
                        </div>
                        <div class="col">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" id="phonenumber" placeholder="VD: +84 67235914">
                        </div>
                    </div>
                </div>
    
                <!-- Change Password section -->
                <div class="changePassword">
                    <div class="row">
                        <div class="col">
                            <label for="user">Username</label>
                            <input type="text" name="user" id="user">
                        </div>
                        <div class="col">
                            <label for="pass">Password</label>
                            <div class="password-field">
                                <input type="password" name="pass" id="pass">
                                <span class="toggle-password" onclick="togglePassword('pass', this)">🔒</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="newpass">New Password</label>
                            <div class="password-field">
                                <input type="password" name="newpass" id="newpass">
                                <span class="toggle-password" onclick="togglePassword('newpass', this)">🔒</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    function togglePassword(id, icon) {
                        const passwordField = document.getElementById(id);
                        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                        passwordField.setAttribute("type", type);
                        
                        // Thay đổi biểu tượng ổ khóa
                        if (type === "password") {
                            icon.innerHTML = "🔒"; // Mật khẩu đang ẩn (ổ khóa đóng)
                        } else {
                            icon.innerHTML = "🔓"; // Mật khẩu đang hiển thị (ổ khóa mở)
                        }
                    }
                </script>
                    
                <div class="form-buttons">
                    <button type="submit" class="btn-save">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.footeradmin')