@extends('layouts.client')

@section('content')

<!-- Danh mục nổi bật -->
<div class="container mt-5">
    <h4 class="mb-4">Danh mục nổi bật</h4>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-2 col-6 mb-4 text-center">
                <a href="{{ route('client.category.products', $category->id) }}" class="text-decoration-none">
                    <div class="card p-2 h-100">
                        <img src="{{ asset('uploads/categories/' . $category->image) }}" class="img-fluid mb-2" style="height:60px; object-fit:contain;">
                        <p class="mb-0 text-dark">{{ $category->name }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- Sản phẩm mới nhất -->
<div class="container mt-5">
    <h4 class="mb-4">Sản phẩm mới nhất</h4>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 180px; object-fit: cover">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted small">{{ Str::limit($product->description, 60) }}</p>
                        <p class="card-text fw-bold">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                        <a href="{{ route('client.product.detail', $product->id) }}" class="btn btn-primary mt-auto">Mua Ngay</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Không có sản phẩm nào.</p>
        @endforelse
    </div>
</div>

<!-- Đánh giá khách hàng -->
<div class="container mt-5">
    <h4 class="mb-4">Khách hàng nói gì về ShopMMO</h4>
    <div class="row">
        @foreach($reviews as $review)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">{{ $review->name }}</h6>
                        <p class="card-text">{{ $review->content }}</p>
                        <p class="text-warning">⭐️⭐️⭐️⭐️⭐️</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Blog / Hướng dẫn -->
<div class="container mt-5">
    <h4 class="mb-4">Tin tức & Hướng dẫn</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Hướng dẫn nâng cấp Canva</h6>
                    <p class="card-text">Chi tiết cách nâng cấp tài khoản Canva Pro giá rẻ.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">So sánh Spotify 1 tháng vs 1 năm</h6>
                    <p class="card-text">Chọn gói nào tiết kiệm và tiện lợi hơn?</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner ưu đãi -->
<div class="container mt-5">
    <div class="alert alert-info text-center">
        🎁 <strong>Đăng ký ngay</strong> để nhận ưu đãi 15% cho đơn đầu tiên! <a href="#" class="btn btn-sm btn-outline-dark ms-2">Tham gia</a>
    </div>
</div>

<!-- Mạng xã hội -->
<div class="container mt-5 text-center">
    <h5>Theo dõi ShopMMO trên mạng xã hội</h5>
    <div class="d-flex justify-content-center gap-3 mt-3">
        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-youtube"></i></a>
        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-tiktok"></i></a>
    </div>
</div>

@endsection
