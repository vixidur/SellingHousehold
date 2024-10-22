<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

@extends('admin.master')

@section('content')
    <div class="main-product">
        <h2>Thêm sản phẩm mới</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="create-products">
                <div class="form1">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" required>
                    
                    <label for="category_id">Danh mục</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label for="image_url">URL Ảnh</label>
                    <input type="url" name="image_url" class="form-control" required>
                </div>
                <div class="form2" >
                    <label for="price">Giá</label>
                    <input type="number" name="price" class="form-control" required>
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" required>
                    <label for="discount">Giảm giá (%)</label>
                    <input type="number" name="discount" class="form-control" min="0"max="100" >
                </div>
            </div>
            <div class="form3">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control"></textarea>
            </div
            <div class="form4">
                <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                <a href="{{route('products.index')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
