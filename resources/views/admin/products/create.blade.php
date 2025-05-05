@extends('layouts.AdminLayout')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container py-4">
  <h4>Thêm sản phẩm</h4>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Tên sản phẩm</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Mô tả</label>
      <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Giá</label>
      <input type="number" name="price" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
      <label for="category_id" class="form-label">Danh mục</label>
      <select name="category_id" class="form-select">
        <option value="">-- Chọn danh mục --</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Hình ảnh</label>
      <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Huỷ</a>
  </form>
</div>
@endsection
