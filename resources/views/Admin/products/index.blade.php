@extends('admin.layouts.app')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm danh mục</a>
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm danh mục"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
                <tr>
                    <td>{{ $pro->id }}</td>
                    <td>{{ $pro->name }}</td>
                    <td>{{ $pro->price }}</td>
                    <td>{{ $pro->quantity }}</td>
                    <td>
                        @if ($pro->image)
                            <img src="{{ asset('storage/' . $pro->image) }}" alt="{{ $pro->image }}" width="80">
                        @else
                            <span class="text-muted">Không có ảnh</span>
                        @endif
                    </td>
                    <td>{{ $pro->category->name }}</td>
                    <td>{{ $pro->status ? 'Hoạt động' : 'Tạm dừng' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('products.destroy', $pro->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn xóa không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
