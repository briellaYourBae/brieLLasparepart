@extends('layouts.app')

@section('title', 'Tentang Kami - BrieLLaSparepart')

@section('styles')
<style>
    .hero-about {
        position: relative;
        background: linear-gradient(135deg, rgba(220,53,69,0.95), rgba(200,35,51,0.95)), url('https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=1200');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        padding: 120px 0 80px;
        text-align: center;
    }
    .hero-about h1 {
        font-size: 3.5rem;
        font-weight: 900;
        text-shadow: 3px 3px 6px rgba(0,0,0,0.3);
        animation: fadeInDown 1s ease;
    }
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .timeline {
        position: relative;
        padding: 50px 0;
    }
    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #DC3545, #FD7E14);
        transform: translateX(-50%);
    }
    .timeline-item {
        position: relative;
        margin-bottom: 50px;
    }
    .timeline-item:nth-child(odd) .timeline-content {
        margin-left: auto;
        text-align: left;
    }
    .timeline-item:nth-child(even) .timeline-content {
        margin-right: auto;
        text-align: right;
    }
    .timeline-content {
        width: 45%;
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        position: relative;
        animation: fadeIn 1s ease;
    }
    .timeline-icon {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 5px 20px rgba(220,53,69,0.4);
        z-index: 2;
    }
    .service-card {
        background: white;
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.08);
        transition: all 0.4s;
        height: 100%;
        border: 2px solid transparent;
    }
    .service-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 70px rgba(220,53,69,0.2);
        border-color: #DC3545;
    }
    .service-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 3rem;
        color: white;
        box-shadow: 0 15px 40px rgba(220,53,69,0.3);
        transform: rotate(-5deg);
        transition: all 0.3s;
    }
    .service-card:hover .service-icon {
        transform: rotate(0deg) scale(1.1);
    }
    .stats-section {
        background: linear-gradient(135deg, #212529, #DC3545);
        padding: 80px 0;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .stats-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .stat-box {
        text-align: center;
        padding: 30px;
        position: relative;
        z-index: 2;
    }
    .stat-number {
        font-size: 4rem;
        font-weight: 900;
        color: #FD7E14;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        animation: countUp 2s ease;
    }
    @keyframes countUp {
        from { opacity: 0; transform: scale(0.5); }
        to { opacity: 1; transform: scale(1); }
    }
    .team-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(220,53,69,0.2);
    }
    .team-img {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: white;
    }
    .why-us-card {
        background: linear-gradient(135deg, #fff, #f8f9fa);
        border-radius: 20px;
        padding: 35px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s;
        height: 100%;
        border: 2px solid transparent;
    }
    .why-us-card:hover {
        transform: translateY(-10px);
        border-color: #DC3545;
        background: white;
    }
    .why-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.5rem;
        color: white;
        box-shadow: 0 10px 30px rgba(220,53,69,0.3);
    }
    .cta-box {
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        border-radius: 30px;
        padding: 60px;
        text-align: center;
        color: white;
        box-shadow: 0 20px 60px rgba(220,53,69,0.4);
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-about">
    <div class="container">
        <h1 class="mb-4">🏍️ BrieLLaSparepart</h1>
        <p class="lead fs-3">Bengkel Motor Terpercaya Sejak 2015</p>
        <p class="fs-5">Solusi Lengkap untuk Kendaraan Roda 2 Anda</p>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold text-danger">Perjalanan Kami</h2>
            <p class="lead text-muted">Dari Bengkel Kecil Hingga Menjadi Pilihan Utama</p>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-icon"><i class="bi bi-flag-fill"></i></div>
                <div class="timeline-content">
                    <h4 class="text-danger">2015 - Awal Mula</h4>
                    <p class="text-muted">Memulai usaha bengkel motor kecil dengan 2 mekanik dan komitmen memberikan pelayanan terbaik</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-icon"><i class="bi bi-tools"></i></div>
                <div class="timeline-content">
                    <h4 class="text-danger">2018 - Ekspansi</h4>
                    <p class="text-muted">Menambah fasilitas dan peralatan modern, serta memperluas layanan penjualan sparepart</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-icon"><i class="bi bi-award-fill"></i></div>
                <div class="timeline-content">
                    <h4 class="text-danger">2020 - Sertifikasi</h4>
                    <p class="text-muted">Mekanik kami mendapat sertifikasi resmi dan menjadi bengkel rekanan beberapa brand motor</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-icon"><i class="bi bi-globe"></i></div>
                <div class="timeline-content">
                    <h4 class="text-danger">2024 - Digital Era</h4>
                    <p class="text-muted">Meluncurkan sistem booking online dan e-commerce sparepart untuk kemudahan pelanggan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold text-danger">Layanan Kami</h2>
            <p class="lead text-muted">Solusi Lengkap untuk Motor Anda</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-gear-fill"></i>
                    </div>
                    <h3 class="text-danger text-center mb-3">Penjualan Sparepart</h3>
                    <ul class="text-muted">
                        <li>Sparepart original semua merk motor</li>
                        <li>Oli mesin berkualitas premium</li>
                        <li>Ban motor berbagai ukuran & merk</li>
                        <li>Aki motor bergaransi</li>
                        <li>Aksesoris & modifikasi motor</li>
                        <li>Sistem pemesanan online</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h3 class="text-danger text-center mb-3">Servis Motor</h3>
                    <ul class="text-muted">
                        <li>Servis berkala & tune up</li>
                        <li>Ganti oli & filter udara</li>
                        <li>Perbaikan mesin & transmisi</li>
                        <li>Ganti ban & balancing</li>
                        <li>Service rem & kopling</li>
                        <li>Booking servis online</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number">9+</div>
                    <h5>Tahun Pengalaman</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number">5000+</div>
                    <h5>Motor Terservis</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number">1500+</div>
                    <h5>Sparepart Tersedia</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number">100%</div>
                    <h5>Kepuasan Pelanggan</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold text-danger">Mengapa Memilih Kami?</h2>
            <p class="lead text-muted">Keunggulan yang Membuat Kami Berbeda</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="why-us-card">
                    <div class="why-icon">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <h5 class="text-danger">Sparepart Original</h5>
                    <p class="text-muted small">100% original dengan garansi resmi</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="why-us-card">
                    <div class="why-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="text-danger">Mekanik Ahli</h5>
                    <p class="text-muted small">Bersertifikat & berpengalaman</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="why-us-card">
                    <div class="why-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h5 class="text-danger">Harga Terjangkau</h5>
                    <p class="text-muted small">Harga kompetitif & transparan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="why-us-card">
                    <div class="why-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h5 class="text-danger">Servis Cepat</h5>
                    <p class="text-muted small">Pengerjaan tepat waktu</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="cta-box">
            <h2 class="display-5 fw-bold mb-4">Siap Merawat Motor Anda?</h2>
            <p class="lead mb-4">Percayakan kendaraan Anda kepada ahlinya. Booking sekarang dan dapatkan pelayanan terbaik!</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('booking') }}" class="btn btn-light btn-lg px-5 py-3">
                    <i class="bi bi-calendar-check"></i> Booking Servis
                </a>
                <a href="{{ route('sparepart') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                    <i class="bi bi-cart-fill"></i> Lihat Sparepart
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
