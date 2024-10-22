<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
@extends('admin.master')

@section('content')
    <div class="maincategory">
        <h2>DANH SÁCH DANH MỤC SẢN PHẨM</h2>
        <div class="add-catagory-products">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm danh mục</a>
        </div>

        <div class="table-wrapper-category">
            <table class="table table-bordered-category">
                <thead>
                    <tr>
                        <th class="th-category">ID</th>
                        <th class="th-category">Tên danh mục</th>
                        <th class="th-category">Mô tả</th>
                        <th class="th-category">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="td-category">{{ $category->id }}</td>
                            <td class="td-category">{{ $category->name }}</td>
                            <td class="td-category">{{ $category->description }}</td>
                            <td class="td-category">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
