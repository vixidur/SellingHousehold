<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title', 'TRANG CHỦ ADMIN')</title>
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
<link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@include('admin.layouts.nav')
@include('admin.layouts.headeradmin')
<div class="container">
    <div class="maindashboard">
        <h1>Welcome to Admin Dashboard</h1>
    </div>
</div>
@include('admin.layouts.footeradmin')
