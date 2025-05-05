
@extends('layouts.client')

@section('content')
<div class="container mt-5">
    <h3>Liên hệ & Hỗ trợ</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('client.contact.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Nội dung</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
    </form>
</div>
@endsection
