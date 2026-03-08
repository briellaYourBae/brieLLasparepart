@extends('layouts.app')

@section('title', 'Beranda - BrieLLaSparepart')

@section('styles')
<style>
    .hero-section {
        position: relative;
        min-height: 600px;
        overflow: hidden;
        background: #000;
    }
    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(220,53,69,0.85), rgba(200,35,51,0.9)), url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1920');
        background-size: cover;
        background-position: center;
        animation: zoomIn 20s infinite alternate;
    }
    @keyframes zoomIn {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    .hero-content {
        position: relative;
        z-index: 2;
        padding: 80px 0;
    }
    .info-box {
        background: rgba(255,255,255,0.98);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        animation: slideInRight 1s ease;
        border: 3px solid #FD7E14;
    }
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .brand-name {
        font-size: 2.5rem;
        font-weight: 900;
        color: #DC3545;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 15px;
    }
    .info-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .info-item:last-child {
        border-bottom: none;
    }
    .info-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-right: 15px;
    }
    .hero-text {
        color: white;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
        animation: fadeInUp 1s ease;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .feature-card {
        border: none;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s;
        height: 100%;
        background: white;
    }
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(220,53,69,0.2);
    }
    .feature-icon {
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
    .cta-section {
        background: linear-gradient(135deg, #212529, #DC3545);
        padding: 80px 0;
        color: white;
    }
    .stat-box {
        text-align: center;
        padding: 20px;
    }
    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        color: #FD7E14;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="hero-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-text">
                        <div class="badge bg-danger mb-3 px-4 py-2 fs-6">
                            <i class="bi bi-award-fill"></i> Bengkel Motor Terpercaya #1
                        </div>
                        <h1 class="display-2 fw-bold mb-4">Bengkel Motor<br><span style="color: #FD7E14;">Profesional</span></h1>
                        <p class="lead fs-4 mb-4"><i class="bi bi-check-circle-fill text-warning"></i> Teknisi Berpengalaman<br>
                        <i class="bi bi-check-circle-fill text-warning"></i> Sparepart Original<br>
                        <i class="bi bi-check-circle-fill text-warning"></i> Harga Terjangkau<br>
                        <i class="bi bi-check-circle-fill text-warning"></i> Garansi Servis</p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('booking') }}" class="btn btn-danger btn-lg px-5 py-3 shadow-lg">
                                <i class="bi bi-calendar-check"></i> Booking Servis Sekarang
                            </a>
                            <a href="{{ route('sparepart') }}" class="btn btn-warning btn-lg px-5 py-3 shadow-lg">
                                <i class="bi bi-cart-fill"></i> Lihat Sparepart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="info-box">
                        <div class="brand-name">
                            <i class="bi bi-tools"></i> BrieLLaSparepart
                        </div>
                        <p class="text-danger fw-bold mb-4"><i class="bi bi-star-fill"></i> Bengkel Motor & Sparepart Profesional</p>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <strong class="d-block text-danger">Lokasi Bengkel</strong>
                                <span class="text-muted">Jl. Raya Motor No. 123, Kota</span>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div>
                                <strong class="d-block text-danger">Jam Buka Bengkel</strong>
                                <span class="text-muted">Senin - Sabtu: 08:00 - 17:00</span>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <strong class="d-block text-danger">Hubungi Bengkel</strong>
                                <span class="text-muted">0812-3456-7890 (WhatsApp)</span>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-wrench-adjustable-circle-fill"></i>
                            </div>
                            <div>
                                <strong class="d-block text-danger">Layanan Bengkel</strong>
                                <span class="text-muted">Servis, Ganti Oli, Tune Up, Sparepart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number" data-target="{{ \App\Models\Booking::where('status', 'selesai')->count() }}">0</div>
                    <p class="text-muted mb-0">Motor Terservis</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number" data-target="{{ \App\Models\Sparepart::count() }}">0</div>
                    <p class="text-muted mb-0">Sparepart Tersedia</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number" data-target="5">0</div>
                    <p class="text-muted mb-0">Tahun Pengalaman</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="stat-number" data-target="100">0</div>
                    <p class="text-muted mb-0">Kepuasan Pelanggan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-target'));
    const duration = 2000;
    const increment = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + (element.parentElement.querySelector('p').textContent.includes('Kepuasan') ? '%' : '+');
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + (element.parentElement.querySelector('p').textContent.includes('Kepuasan') ? '%' : '+');
        }
    }, 16);
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.stat-number');
            counters.forEach(counter => animateCounter(counter));
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.addEventListener('DOMContentLoaded', () => {
    const statsSection = document.querySelector('.bg-light');
    if (statsSection) observer.observe(statsSection);
});
</script>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 text-danger mb-3">Layanan Kami</h2>
            <p class="lead text-muted">Solusi lengkap untuk kebutuhan motor Anda</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-gear-fill"></i>
                    </div>
                    <h4 class="text-center text-danger mb-3">Sparepart Original</h4>
                    <p class="text-center text-muted">Menyediakan sparepart motor original dan berkualitas untuk semua merk dengan harga kompetitif</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h4 class="text-center text-danger mb-3">Servis Profesional</h4>
                    <p class="text-center text-muted">Layanan servis motor dengan mekanik berpengalaman dan peralatan modern yang lengkap</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h4 class="text-center text-danger mb-3">Booking Online</h4>
                    <p class="text-center text-muted">Reservasi servis motor secara online, praktis dan cepat tanpa perlu antri lama</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="display-4 fw-bold mb-4">Siap Merawat Motor Anda?</h2>
        <p class="lead mb-5">Dapatkan layanan terbaik untuk kendaraan kesayangan Anda</p>
        <a href="{{ route('booking') }}" class="btn btn-danger btn-lg px-5 py-3">
            <i class="bi bi-calendar-check"></i> Booking Sekarang
        </a>
    </div>
</section>
@endsection
