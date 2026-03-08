# 🏍️ BrieLLaSparepart - Motorcycle Workshop Management System

![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.3-blue.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

Sistem manajemen bengkel motor dan penjualan sparepart berbasis web menggunakan Laravel. Aplikasi ini menyediakan fitur lengkap untuk mengelola booking servis, penjualan sparepart, pesanan, dan artikel workshop.

## ✨ Fitur Utama

### 🌐 Public Features
- **Homepage Modern** - Landing page dengan hero section, info box, dan statistik
- **Katalog Sparepart** - Tampilan produk dengan foto, harga, dan stok
- **Booking Servis Online** - Form reservasi servis motor
- **Sistem Pemesanan** - Order dengan metode pickup/delivery dan upload bukti pembayaran
- **Artikel Workshop** - Tips dan informasi perawatan motor
- **Halaman Kontak** - Informasi lokasi dan kontak bengkel

### 🔐 Admin Panel
- **Dashboard** - Statistik lengkap dengan grafik dan aktivitas terbaru
- **Manajemen Booking Servis** - CRUD data booking servis motor
- **Manajemen Sparepart** - CRUD produk dengan upload foto
- **Manajemen Pesanan** - Kelola order dengan update status dan bukti pembayaran
- **Manajemen Artikel** - CRUD artikel dengan foto dan slug otomatis
- **Manajemen User** - Kelola user dengan role SuperAdmin

## 🎨 Tema & Design

- **Color Scheme**: Red (#DC3545), Black (#212529), Orange (#FD7E14)
- **UI Framework**: Bootstrap 5.3
- **Icons**: Bootstrap Icons
- **Animations**: CSS transitions dan keyframe animations
- **Responsive**: Mobile-friendly design

## 🛠️ Tech Stack

- **Framework**: Laravel 12.x
- **PHP**: 8.3+
- **Database**: SQLite
- **Frontend**: Bootstrap 5.3, Vanilla JavaScript
- **Authentication**: Laravel Auth
- **File Storage**: Laravel Storage (local)

## 📋 Requirements

- PHP >= 8.3
- Composer
- SQLite Extension
- Node.js & NPM (optional, untuk asset compilation)

## 🚀 Installation

1. **Clone Repository**
```bash
git clone https://github.com/yourusername/brieLLasparepart.git
cd brieLLasparepart
```

2. **Install Dependencies**
```bash
composer install
```

3. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Setup**
```bash
# Database sudah include: database/db_goldenstrategy.sqlite
php artisan migrate
php artisan db:seed --class=AdminSeeder
```

5. **Storage Link**
```bash
php artisan storage:link
```

6. **Run Application**
```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## 👤 Default Admin Credentials

```
Email: admin@briellasparepart.com
Password: admin123
Role: superadmin
```

## 📁 Project Structure

```
brieLLasparepart/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BookingController.php
│   │   │   ├── SparepartController.php
│   │   │   ├── OrderController.php
│   │   │   ├── ArticleController.php
│   │   │   └── ...
│   │   └── Middleware/
│   │       └── SuperAdminMiddleware.php
│   └── Models/
│       ├── Booking.php
│       ├── Sparepart.php
│       ├── Order.php
│       └── Article.php
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── booking/
│       │   ├── sparepart/
│       │   ├── order/
│       │   ├── article/
│       │   └── dashboard.blade.php
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── home.blade.php
│       ├── sparepart.blade.php
│       ├── booking.blade.php
│       └── article.blade.php
├── database/
│   ├── migrations/
│   └── seeders/
└── routes/
    └── web.php
```

## 🔑 Key Features Detail

### Order System
- **Metode Pengambilan**: 
  - Ambil di Bengkel (pilih tanggal)
  - Diantar ke Alamat (DP 50% + upload bukti)
- **Status Order**: Pending, Diproses, Selesai, Dibatalkan
- **Payment Proof**: Upload bukti pembayaran untuk delivery

### Photo Upload
- **Supported Formats**: JPEG, PNG, JPG, GIF, WEBP
- **Max Size**: 5MB
- **Storage**: `storage/app/public/sparepart` & `storage/app/public/article`
- **Display**: 250x250px grid dengan preview

### Authentication
- **Login Only**: No registration (admin-managed)
- **Role**: SuperAdmin
- **Middleware**: Protected admin routes

## 🎯 Routes

### Public Routes
- `/` - Homepage
- `/sparepart` - Katalog sparepart
- `/booking` - Form booking servis
- `/article` - List artikel
- `/article/{slug}` - Detail artikel
- `/kontak` - Halaman kontak
- `/profil` - Tentang bengkel

### Admin Routes (Protected)
- `/admin/dashboard` - Dashboard admin
- `/admin/booking` - Manajemen booking
- `/admin/sparepart` - Manajemen sparepart
- `/admin/order` - Manajemen pesanan
- `/admin/article` - Manajemen artikel
- `/admin/user` - Manajemen user

## 🎨 Customization

### Colors
Edit di `resources/views/layouts/app.blade.php`:
```css
:root {
    --red-primary: #DC3545;
    --red-dark: #C82333;
    --black-primary: #212529;
    --orange-accent: #FD7E14;
}
```

### Logo & Branding
Update di:
- `resources/views/layouts/app.blade.php` (navbar)
- `resources/views/layouts/admin.blade.php` (sidebar)
- `resources/views/home.blade.php` (hero section)

## 📸 Screenshots

### Homepage
Modern landing page dengan hero section, info box, dan feature cards.

### Admin Dashboard
Dashboard dengan statistik, grafik order, dan aktivitas terbaru.

### Sparepart Catalog
Grid layout dengan foto produk, harga, dan stok.

### Booking Form
Form reservasi servis dengan pilihan jenis servis dan tanggal.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

Developed with ❤️ for motorcycle workshop management

## 📞 Support

For support, email info@briellasparepart.com or create an issue in this repository.

---

**BrieLLaSparepart** - Solusi Digital untuk Bengkel Motor Modern 🏍️✨
