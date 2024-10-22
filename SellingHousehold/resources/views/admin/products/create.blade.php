<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

@extends('admin.master')

@section('content')
    <div class="main-product">
        <h2>Thêm sản phẩm mới</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image_url">URL Ảnh</label>
                <input type="url" name="image_url" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="discount">Giảm giá (%)</label>
                <input type="number" name="discount" class="form-control" min="0"
                    max="100>
            </div>
            <button type="submit" class="btn btn-primary">Lưu sản
                phẩm</button>
        </form>
    </div>
@endsection
