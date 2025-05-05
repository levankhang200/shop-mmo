@extends('layouts.client')

@section('content')
<div class="row mt-5">
    <div class="col-md-6">
        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow">
    </div>
    <div class="col-md-6">
        <h2 class="mb-3">{{ $product->name }}</h2>
        <h4 class="text-danger mb-4">{{ number_format($product->price, 0, ',', '.') }} đ</h4>

        <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không có danh mục' }}</p>
        <p><strong>Người bán:</strong> {{ $product->user->name ?? 'Unknown Seller' }}</p>

        <p class="mt-4">
            <strong>Mô tả sản phẩm:</strong><br>
            {!! nl2br(e($product->description ?? 'Không có mô tả.')) !!}
        </p>

        <div class="mt-4">
        <form action="{{ route('client.orders.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-success">Thêm vào đơn hàng</button>
        </form>
            <a href="{{ route('client.home') }}" class="btn btn-outline-secondary btn-lg ms-2">Quay lại</a>
        </div>
    </div>
</div>
@endsection
