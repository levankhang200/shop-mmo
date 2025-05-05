<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMMO - Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @yield('scripts')
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <!-- <img src="{{ asset('uploads/products/1745574242_netflix.jpg') }}" alt="Logo" height="50" class="me-2"> -->
            <span class="fw-bold text-primary fs-4">ShopMMO</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="/">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('client.contact') }}">Liên hệ</a>
                </li>
            </ul>

            <!-- Search -->
            <form class="d-flex position-relative me-3" action="{{ route('client.search') }}" method="GET" style="width: 300px;">
                <input class="form-control rounded-pill pe-5" type="text" name="search" placeholder="Tìm sản phẩm..." aria-label="Search">
                <button class="btn position-absolute end-0 top-0 mt-1 me-1" type="submit" style="z-index: 10;">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <!-- Avatar -->
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('uploads/products/1745831927_351168071_281449687612827_7072112573375244881_n.jpg') }}" alt="Avatar" width="40" height="40" class="rounded-circle shadow-sm">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('client.account') }}">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="{{ route('client.orders.index') }}">Đơn hàng</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


    <!-- Banner -->
<div class="container-fluid p-0 mt-4">
    <img src="{{ asset('uploads/products/banner-Shopmmo.png') }}" class="img-fluid w-100" alt="Banner ShopMMO">
</div>



    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2025 ShopMMO. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
