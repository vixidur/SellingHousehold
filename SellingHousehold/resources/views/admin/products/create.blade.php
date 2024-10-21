<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

@extends('admin.master')

@section('content')
    <div class="main-container-addproduct">
        <form action="{{ route('products.store') }}" method="POST">
            <h2>Thêm sản phẩm mới</h2>
            @csrf
            <div class="form-group-create-product">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control-create-product" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-danger-create-product">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-create-product">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control-create-product">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger-create-product">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-create-product">
                <label for="price">Giá</label>
                <input type="number" step="0.01" name="price" class="form-control-create-product" value="{{ old('price') }}"
                    required>
                @error('price')
                    <span class="text-danger-create-product">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-create-product">
                <label for="quantity">Số lượng</label>
                <input type="number" name="quantity" class="form-control-create-product" value="{{ old('quantity') }}" required>
                @error('quantity')
                    <span class="text-danger-create-product">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-create-product">
                <label for="category_id">Danh mục</label>
                <select name="category_id" class="form-control-create-product" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger-create-product">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_url">URL Ảnh</label>
                <input type="text" name="image_url" class="form-control-create-product" value="{{ old('image_url') }}">
                @error('image_url')
                    <span class="text-danger-create-product">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <a href="{{route('products.index')}}" class="cancel-addproduct">Hủy</a>
        </form>
    </div>
@endsection
