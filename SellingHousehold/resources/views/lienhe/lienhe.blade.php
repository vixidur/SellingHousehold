<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIÊN HỆ</title>
    <link rel="stylesheet" href="{{ asset('css/lienhe.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
</head>

<body class="login-page">
    @include('layouts.header')

    <div class="lienhe-container">
    <div class="frm-content">
        <h2><b>Liên hệ</b></h2>
        <p><b>UNETI GROUP: </b>TRƯỜNG ĐẠI HỌC KINH TẾ KỸ THUẬT CÔNG NGHIỆP HÀ NỘI</p>
        <p><b>Văn phòng: </b>218 Lĩnh Nam, Quận Hoàng Mai, Hà Nội</p>
        <p><b>Email: </b>cskh@uneti.edu.vn</p>
        <p><b>Hotline: </b>0862587229</p>
        <form action="{{ route('lienhe') }}" method="POST">
            @csrf
    
            <!-- Tên -->
            <input type="text" id="ten" name="ten" placeholder="Họ tên *" value="{{ old('ten') }}">
            @if ($errors->has('ten'))
                <div class="error" style="color: red;">{{ $errors->first('ten') }}</div>
            @endif
            <br>
    
            <!-- Email -->
            <input type="email" id="email" name="email" placeholder="Email *" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
            @endif
            <br>
    
            <!-- Nội dung -->
            <textarea id="noi_dung" placeholder="Nội dung *" name="noi_dung">{{ old('noi_dung') }}</textarea>
            @if ($errors->has('noi_dung'))
                <div class="error" style="color: red;">{{ $errors->first('noi_dung') }}</div>
            @endif
            <br>
            <p>* Thông tin bắt buộc *</p>
            <button type="submit">Gửi liên hệ</button>
        </form>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d931.3257156001965!2d105.87535187571716!3d20.980493416088514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3135ac0e92698de3%3A0xd292c7ac11788d4a!2zTeG7syBW4bqxbiBUaOG6r24gUGjhu5EgOC8zLCAxMDgtRDE0IFAuIDgtMywgUXXhu7NuaCBNYWksIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWkgMTAwMDAwLCBWaeG7h3QgTmFt!3m2!1d20.999618899999998!2d105.859191!4m5!1s0x3135afd765487289%3A0x21bd5839ba683d5f!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBLaW5oIFThur8gS-G7uSBUaHXhuq10IEPDtG5nIE5naGnhu4dwLCDEkMaw4budbmcgTMSpbmggTmFtLCBWxKluaCBIxrBuZywgSG_DoG5nIE1haSwgSMOgIE7hu5lp!3m2!1d20.980355!2d105.8758057!5e0!3m2!1svi!2s!4v1732034909993!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>

    @include('layouts.footer')
    <script>
        @if (Session::has('success'))
            Notiflix.Notify.success("{{ Session::get('success') }}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Notiflix.Notify.failure("{{ $error }}");
            @endforeach
        @endif
    </script>
</body>

</html>