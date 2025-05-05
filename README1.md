# ShopMMO - Website Bán Tài Khoản Số

Website demo bán tài khoản/dịch vụ kỹ thuật số, sử dụng Laravel + Bootstrap + AdminLTE.

## 🚀 Tính năng chính

- Xem danh mục & chi tiết sản phẩm
- Tìm kiếm sản phẩm
- Đăng ký / Đăng nhập người dùng
- Giỏ hàng & Đặt hàng
- Thanh toán giả lập (QR / Thẻ cào)
- Dashboard Admin quản lý danh mục, sản phẩm, đơn hàng, người dùng
- Trang liên hệ & thông tin tài khoản

## 🛠️ Công nghệ sử dụng

- Laravel 10
- Bootstrap 5 / AdminLTE
- MySQL
- Blade Templating

## ⚙️ Cài đặt nhanh

### 1. Clone repo
```bash
git clone https://github.com/levankhang200/shop-mmo.git
cd shop-mmo
```

### 2. Cài thư viện Laravel
```bash
composer install
```

### 3. Cấu hình file `.env`
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Tạo database và cấu hình trong `.env`

```env
DB_DATABASE=shopmmo
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Chạy migration và seed dữ liệu
```bash
php artisan migrate --seed
```

### 6. Chạy server
```bash
php artisan serve
```

Truy cập: [http://localhost:8000](http://localhost:8000)

## 🧪 Tài khoản test

```txt
Email: user@example.com
Password: 12345678
```

```txt
Email: admin@example.com
Password: 12345678
```

## 📦 Ghi chú

- Dữ liệu sản phẩm & danh mục đã được seed sẵn.
- Tính năng thanh toán chỉ là demo (giả lập thành công).
