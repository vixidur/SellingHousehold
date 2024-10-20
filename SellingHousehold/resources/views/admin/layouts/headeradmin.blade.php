<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">

<div class="main-admin-header">
    <div class="headeradmin">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Tìm kiếm...">
            <button class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="manager-admin">
            <ul>
                <li>
                    <div class="profiles">
                        @if (Auth::guard('admin')->check())
                            <!-- Kiểm tra xem người dùng đã đăng nhập -->
                            <img src="{{ Auth::guard('admin')->user()->picture_url ?? asset('images/default-avatar.png') }}"
                                alt="Avatar" class="avatar">
                            <a href="#" class="dropdown-toggle" onclick="toggleDropdown(event)">Xin chào,
                                {{ Auth::guard('admin')->user()->username }}</a>
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="avatar">
                            <a href="#" class="dropdown-toggle">Xin chào, Khách</a>
                        @endif
                        <ul class="dropdown">
                            @if (Auth::guard('admin')->check())
                                <li><a href="{{ route('myprofile') }}"><i class="fas fa-id-card"></i> Thông tin cá
                                        nhân</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                    </a>
                                </li>
                            @else
                                <li><a href="{{ route('admin.login') }}"><i class="fas fa-sign-in-alt"></i> Đăng
                                        nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    function toggleDropdown(event) {
        event.preventDefault();
        const dropdown = event.target.nextElementSibling;
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }
</script>
