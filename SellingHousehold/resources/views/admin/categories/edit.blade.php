<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">s
@extends('admin.master')

@section('content')
    <div class="edit-category">
        <h2>Thay đổi thông tin danh mục</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{route('category')}}" class="cancel-btn">Hủy</a>
        </form>
    </div>
@endsection
