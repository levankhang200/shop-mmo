@extends('layouts.client')

@section('content')
    <h2>Sản phẩm trong danh mục: {{ $category->name }}</h2>

    <div class="row mt-4">
        @forelse($category->products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                        <a href="{{ route('client.product.detail', $product->id) }}" class="btn btn-primary mt-auto">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Không có sản phẩm nào trong danh mục này.</p>
        @endforelse
    </div>
@endsection
