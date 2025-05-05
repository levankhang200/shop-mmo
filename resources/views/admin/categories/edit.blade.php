@extends('layouts.AdminLayout')

@section('title', 'Sửa danh mục')

@section('content')
<div class="container mt-4">
  <h3>Sửa danh mục</h3>
  <form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
  </form>
</div>
@endsection
