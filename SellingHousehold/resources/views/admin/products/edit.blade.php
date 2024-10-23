<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">s

@extends('admin.master')

@section('content')
    <div class="main-product">
        <h2>Chỉnh sửa sản phẩm</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="edit-container">
                <div class="top">
                    <div class="box">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        <label for="category_id">Danh mục</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="image_url">URL Ảnh</label>
                        <input type="url" name="image_url" class="form-control" value="{{ $product->image_url }}" required>
                    </div>
                    <div class="box">
                        <label for="price">Giá</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                        <label for="quantity">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                        <label for="discount">Giảm giá (%)</label>
                        <input type="number" name="discount" class="form-control" value="{{ $product->discount }}" min="0"
                        max="100">
                    </div>
                </div>
                <div class="bottom">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="btn-update-remove">
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                <a href="{{route('products.index')}}" class="cancel-editproduct">Hủy</a>
            </div>
        </form>
    </div>
@endsection
