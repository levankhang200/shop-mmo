@extends('layouts.AdminLayout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Danh sách khách hàng</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Đơn hàng</th>
            </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->role }}</td>
                <td>
                    <a href="{{ route('admin.customers.orders', $customer->id) }}" class="btn btn-primary btn-sm">Xem đơn</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Không có khách hàng nào</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
