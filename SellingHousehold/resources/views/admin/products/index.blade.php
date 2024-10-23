<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
@extends('admin.master')

@section('content')
    <div class="main-product">
        <div class="add-product">
            <h2>Danh sách sản phẩm</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
        </div>
        <div class="table-wrapper-product">
            <table class="table table-bordered-product">
                <thead class="thead-product">
                    <tr>
                        <th class="th-product">ID</th>
                        <th class="th-product">Tên sản phẩm</th>
                        <th class="th-product">Mô tả</th>
                        <th class="th-product">Giá</th>
                        <th class="th-product">Số lượng</th>
                        <th class="th-product">Danh mục</th>
                        <th class="th-product">URL Ảnh</th>
                        <th class="th-product">Giảm giá</th>
                        <th class="th-product">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="td-product">{{ $product->id }}</td>
                            <td class="td-product">{{ $product->name }}</td>
                            <td class="td-product">{{ $product->description }}</td>
                            <td class="td-product">{{ $product->price }}</td>
                            <td class="td-product">{{ $product->quantity }}</td>
                            <td class="td-product">{{ $product->category->name ?? 'N/A' }}</td>
                            <td class="td-product"><img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                    style="max-width: 150px; max-height: 150px;"></td>
                            <td class="td-product">{{ $product->discount }}</td>
                            <td class="td-product">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    >
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
