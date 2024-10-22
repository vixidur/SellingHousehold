<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
@extends('admin.master')

@section('content')
    <div class="main-product">
        <div class="add-product">
            <h2>Danh sách sản phẩm</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
        </div>
        <div class="product-scroll">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>URL Ảnh</th>
                        <th>Giảm giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                    style="max-width: 150px; max-height: 150px;"></td>
                            <td>{{ $product->discount }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
