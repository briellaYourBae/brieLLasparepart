# GOLDEN STRATEGY - Website Desa Wirausaha

Website platform digital untuk program "GOLDEN STRATEGY: Pemberdayaan SDM KWT melalui Branding dan Penguatan Rantai Pasok Melon Golden Aroma Hidroponik menuju Desa Wirausaha."

## Fitur

### Website Publik
- Beranda
- Produk Melon
- Data Hasil Panen
- Profil Desa
- Kontak

### Dashboard Admin
- Dashboard dengan statistik
- Manajemen Produk
- Data Panen
- Anggota KWT
- Pengaturan

## Instalasi

1. Clone repository
2. Copy `.env.example` ke `.env`
3. Generate application key:
```bash
php artisan key:generate
```

4. Jalankan migrasi database:
```bash
php artisan migrate
```

5. Jalankan seeder untuk membuat admin:
```bash
php artisan db:seed
```

6. Jalankan aplikasi:
```bash
php artisan serve
```

## Login Admin

**Email:** admin@goldenstrategy.com  
**Password:** admin123

## Teknologi

- Laravel 11
- Bootstrap 5
- Bootstrap Icons
- MySQL/SQLite

## Tema Desain

- Hijau daun (#4CAF50)
- Kuning melon (#FFD54F)
- Putih bersih
- Fresh & Natural

## Struktur

```
├── app/
│   └── Http/
│       └── Controllers/
│           ├── HomeController.php
│           ├── AdminController.php
│           └── Auth/
│               └── LoginController.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── auth/
│       │   └── login.blade.php
│       ├── admin/
│       │   └── dashboard.blade.php
│       ├── home.blade.php
│       ├── produk.blade.php
│       ├── panen.blade.php
│       ├── profil.blade.php
│       └── kontak.blade.php
└── routes/
    └── web.php
```
