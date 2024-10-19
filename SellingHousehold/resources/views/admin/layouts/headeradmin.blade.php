<link rel="stylesheet" href="{{asset('css/admin/dashboard.css')}}">
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
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
                    <i class="far fa-user"></i>
                    <a href="#" class="dropdown-toggle">Xin chao, {{ 'VAN CHIEN' }}</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('myprofile') }}"><i class="fas fa-id-card"></i> My profile</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Log out
                            </a>
                        </li>                        
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
