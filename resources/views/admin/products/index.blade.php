@extends('layouts.AdminLayout')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Sản phẩm</h4>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
  </div>
  <form action="{{ route('products.index') }}" method="GET" class="mb-3 d-flex" role="search">
    <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control me-2" placeholder="Tìm kiếm sản phẩm...">
    <button type="submit" class="btn btn-outline-primary">Tìm</button>
</form>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Danh mục</th>
        <th>Ảnh</th>
        <th>Người bán</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @forelse($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ number_format($product->price, 0) }} đ</td>
          <td>{{ $product->category->name }}</td>
          <td>
            @if($product->image)
              <img src="{{ asset('uploads/products/' . $product->image) }}" width="60">
            @else
              <em>Không có ảnh</em>
            @endif
          </td>
          <td>{{ $product->seller->name ?? 'N/A' }}</td>
          <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Sửa</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc xoá?')" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Xoá</button>
            </form>

          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7">Không có sản phẩm nào.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
