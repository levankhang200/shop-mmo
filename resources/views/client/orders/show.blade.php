{{-- resources/views/client/orders/show.blade.php --}}
@extends('layouts.client')

@section('content')
<div class="container mt-5">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>

    <div class="mb-4">
        <strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}<br>
        <strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} đ
    </div>

    <h4>Sản phẩm trong đơn:</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('uploads/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="70">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('client.home') }}" class="btn btn-primary mt-3">Về Trang Chủ</a>
</div>
@endsection
