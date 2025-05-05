@extends('layouts.AdminLayout')

@section('title', 'Thêm danh mục')

@section('content')
<div class="container mt-4">
  <h3>Thêm danh mục</h3>
  <form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
  </form>
</div>
@endsection
