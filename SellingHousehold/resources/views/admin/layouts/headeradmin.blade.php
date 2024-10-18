<link rel="stylesheet" href="{{asset('css/admin/headeradmin.css')}}">
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
<div class="headeradmin">
    <div class="manager-admin">
        <ul>
            <li>
                <div class="profiles">
                    <i class="far fa-user"></i>
                    <a href="#" class="dropdown-toggle">Xin chao, {{ 'VAN CHIEN' }}</a>
                    <ul class="dropdown">
                        <li><a href=""><i class="fas fa-id-card"></i> My profile</a></li>
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
