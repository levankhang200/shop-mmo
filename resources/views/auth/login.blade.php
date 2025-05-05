@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đăng nhập</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary">Đăng nhập</button>
    </form>
    <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
</div>
@endsection
