@extends('layouts.client')

@section('content')
    <h2 class="mb-4">Đơn hàng của bạn</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @if($orders->count())
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                        <th>Thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }} đ</td>
                            <td>
                                @if($order->status === 'pending')
                                    <span class="badge bg-warning">Đang xử lý</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge bg-success">Hoàn thành</span>
                                @elseif($order->status === 'cancelled')
                                    <span class="badge bg-danger">Đã hủy</span>
                                @else
                                    <span class="badge bg-secondary">Khác</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                    Xem chi tiết
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('client.orders.pay', $order->id) }}" class="btn btn-sm btn-success">
                                    Thanh toán
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Bạn chưa có đơn hàng nào.
        </div>
    @endif
@endsection
