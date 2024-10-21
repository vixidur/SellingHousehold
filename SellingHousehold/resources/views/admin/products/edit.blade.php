<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">s

@extends('admin.master')

@section('content')
    <div class="main-edit-product">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            <h2>Chỉnh sửa sản phẩm</h2>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}"
                    required>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_url">URL Ảnh</label>
                <input type="text" name="image_url" class="form-control" value="{{ $product->image_url }}">
                @error('image_url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <a href="{{ route('products.index') }}" class="cancel-editproduct">Hủy</a>
        </form>
    </div>
@endsection
