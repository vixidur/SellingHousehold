<div class="related-products">
    <h2>Sản phẩm liên quan</h2>
    <div class="product-grid">
        @if ($relatedProducts->count() > 0)
            @foreach ($relatedProducts as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}</p>
                    <p>Giá: <span class="price">{{ number_format($product->price, 0, ',', '.') }} VND</span></p>
                    <a href="{{ route('products.show', $product->id) }}" class="details-btn">Xem chi tiết</a>
                </div>
            @endforeach
        @else
            <p>Không có sản phẩm liên quan để hiển thị.</p>
        @endif
    </div>
</div>
