@extends('layouts.client')

@section('content')
    <h2>Thanh toán đơn hàng #{{ $order->id }}</h2>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} đ</p>
            <p><strong>Trạng thái hiện tại:</strong>
                @if($order->status == 'pending')
                    <span class="badge bg-warning">Đang chờ thanh toán</span>
                @else
                    <span class="badge bg-success">Đã thanh toán</span>
                @endif
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Chọn phương thức thanh toán
        </div>
        <div class="card-body">
        <form id="paymentForm" action="{{ route('client.orders.process', $order->id) }}" method="POST">                @csrf
                @csrf
                <div class="mb-3">
                    <label class="form-label">Phương thức thanh toán</label>
                    <select class="form-select" name="payment_method" required>
                        <option value="">-- Chọn phương thức --</option>
                        <option value="qr">Thanh toán qua mã QR</option>
                        <option value="card">Thanh toán bằng thẻ cào điện thoại</option>
                    </select>
                </div>

                <div id="qrPayment" class="mt-4" style="display:none;">
                    <h5>Thanh toán bằng mã QR</h5>
                    <img src="{{ asset('uploads/products/qr-sample.png') }}" alt="Mã QR mẫu" class="img-fluid rounded" style="max-width: 300px;">
                    <p class="mt-2">Quét mã để thanh toán.</p>
                </div>

                <div id="cardPayment" class="mt-4" style="display:none;">
                    <h5>Thanh toán bằng thẻ cào</h5>
                    <div class="mb-3">
                        <label class="form-label">Nhập mã thẻ cào</label>
                        <input type="text" name="card_code" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3 w-100">Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentSelect = document.querySelector('select[name="payment_method"]');
        const qrDiv = document.getElementById('qrPayment');
        const cardDiv = document.getElementById('cardPayment');

        paymentSelect.addEventListener('change', function () {
            if (this.value === 'qr') {
                qrDiv.style.display = 'block';
                cardDiv.style.display = 'none';
            } else if (this.value === 'card') {
                qrDiv.style.display = 'none';
                cardDiv.style.display = 'block';
            } else {
                qrDiv.style.display = 'none';
                cardDiv.style.display = 'none';
            }
        });

        const form = document.getElementById('paymentForm');
        form.addEventListener('submit', function (e) {
            // Giả lập loading và thành công
            const button = form.querySelector('button[type="submit"]');
            button.innerText = 'Đang xử lý...';
            button.disabled = true;

            setTimeout(() => {
                // Hiển thị popup
                alert('🎉 Thanh toán thành công!');
                // Redirect về trang đơn hàng
                window.location.href = "{{ route('client.orders.index') }}";
            }, 3000);
        });
    });
</script>
@endsection

