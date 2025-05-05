@extends('layouts.AdminLayout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Đơn hàng của {{ $customer->name }}</h2>
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Mã đơn</th>
        <th>Sản phẩm</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
    </tr>
</thead>
<tbody>
    @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->product->name ?? 'Đã xoá' }}</li>
                    @endforeach
                </ul>
            </td>
            <td>{{ number_format($order->total_price, 0, ',', '.') }} đ</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>{{ $order->created_at->format('d/m/Y') }}</td>
        </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection
