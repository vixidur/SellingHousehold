<link rel="stylesheet" href="{{ asset('css/subheader.css') }}">
<center>
    <div class="slideshow-container">
        <div class="list-image">
            <img src="{{ asset('images/banner/banner1.png') }}" class="swiper-slide">
            <img src="{{ asset('images/banner/banner2.png') }}" class="swiper-slide">
            <!-- Các ảnh duplicate để tạo vòng lặp -->
            <img src="{{ asset('images/banner/banner1.png') }}" class="swiper-slide swiper-slide-duplicate">
            <img src="{{ asset('images/banner/banner2.png') }}" class="swiper-slide swiper-slide-duplicate">
        </div>
    </div>
</center>
<script src="{{ asset('js/main.js') }}"></script>
