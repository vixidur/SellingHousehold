<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TRANG CHỦ')</title>
    <link rel="stylesheet" href="{{ asset('css/headerstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo-home.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/overview.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
</head>
@if (Route::currentRouteName() !== 'login')
    @include('layouts.header')
@endif
@include('subheader.subheader')
<div class="services">
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_1.png') }}" alt=""> <b>FREESHIP</b>
        cho đơn
        hàng từ 1.000.000đ</div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_2.png') }}" alt=""> Hỗ trợ giao 4h nội
        thành
        HN/HCM theo nhu cầu</div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_3.png') }}" alt=""> Đổi trả trong 30
        ngày
    </div>
    <div class="header-item"><img src="{{ asset('images/icon/img_poli_4.png') }}" alt=""> NHẬP MÃ YEUUNETI -
        Giảm 10% cho đơn hàng từ 800.000đ</div>
</div>
<div class="product-list">
    <h2>Danh sách Sản Phẩm</h2>
    <div class="product-grid">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    <h3>{{ $product->name }}</h3>
                    <!-- Shorten the description to 50 characters -->
                    <p>{{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}</p>

                    <!-- Display the original price -->
                    <p>Giá gốc: <span class="original-price">{{ number_format($product->price, 0, ',', '.') }}
                            VND</span></p>

                    @if ($product->discount > 0)
                        <p>Giảm giá: {{ $product->discount }}%</p>
                        <p>Giá sau giảm: <span
                                class="discounted-price">{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}
                                VND</span></p>
                    @endif

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="add-to-cart-btn">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Không có sản phẩm nào để hiển thị.</p>
        @endif
    </div>
</div>
<br>
<div class="product-list">
    <h2>Giá tốt mỗi ngày</h2>
    <div class="product-grid">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    <h3>{{ $product->name }}</h3>
                    <!-- Shorten the description to 50 characters -->
                    <p>{{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}</p>

                    <!-- Display the original price -->
                    <p>Giá gốc: <span class="original-price">{{ number_format($product->price, 0, ',', '.') }}
                            VND</span></p>

                    @if ($product->discount > 0)
                        <p>Giảm giá: {{ $product->discount }}%</p>
                        <p>Giá sau giảm: <span
                                class="discounted-price">{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}
                                VND</span></p>
                    @endif

                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form"
                        data-product-id="{{ $product->id }}">
                        @csrf
                        <button type="button" class="add-to-cart-btn">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Không có sản phẩm nào để hiển thị.</p>
        @endif
    </div>
</div>
<script>
    // success message
    @if (Session::has('success'))
        Notiflix.Notify.success("{{ Session::get('success') }}");
    @endif
    // error message 
    @if (Session::has('success'))
        Notiflix.Notify.error("{{ Session::get('error') }}");
    @endif
</script>
<br><br>
@if (Route::currentRouteName() !== 'login')
    @include('layouts.footer')
@endif
