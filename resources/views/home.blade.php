@extends('layouts.app')

@section('title', 'Beranda - BrieLLaMoto')

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
        background: linear-gradient(135deg, rgba(220,53,69,0.85), rgba(33,37,41,0.9)), url('https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=1920');
        background-size: cover;
        background-position: center;
        animation: zoomIn 20s infinite alternate;
    }
    .hero-bg::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0,0,0,0.03) 10px, rgba(0,0,0,0.03) 20px);
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
                        <h1 class="display-2 fw-bold mb-4">Bengkel Motor<br><span style="color: #FD7E14;">Terpercaya & Profesional</span></h1>
                        <p class="lead fs-5 mb-4">
                        <i class="bi bi-wrench-adjustable text-warning me-2"></i> Teknisi Bersertifikat & Berpengalaman 10+ Tahun<br>
                        <i class="bi bi-shield-check text-warning me-2"></i> Sparepart Original Bergaransi<br>
                        <i class="bi bi-cash-coin text-warning me-2"></i> Harga Transparan & Terjangkau<br>
                        <i class="bi bi-award text-warning me-2"></i> Garansi Servis 30 Hari</p>
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
                            <i class="bi bi-tools"></i> BrieLLaMoto
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
                                <span class="text-muted">Servis, Ganti Oli, Tune Up, Bore Up, Sparepart</span>
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
            <h2 class="fw-bold display-5 text-danger mb-3"><i class="bi bi-tools"></i> Layanan Bengkel Kami</h2>
            <p class="lead text-muted">Solusi lengkap perawatan & perbaikan motor Anda</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-droplet-fill"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Ganti Oli & Filter</h5>
                    <p class="text-center text-muted small">Servis rutin ganti oli mesin, oli gardan, dan filter udara</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Tune Up Mesin</h5>
                    <p class="text-center text-muted small">Penyetelan mesin, busi, karburator untuk performa optimal</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-disc-fill"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Rem & Kampas</h5>
                    <p class="text-center text-muted small">Perbaikan sistem rem, ganti kampas rem depan & belakang</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Overhaul Mesin</h5>
                    <p class="text-center text-muted small">Perbaikan mesin total, ganti piston, ring, bearing</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-battery-charging"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Kelistrikan</h5>
                    <p class="text-center text-muted small">Perbaikan aki, dinamo, CDI, dan sistem kelistrikan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Rantai & Gear</h5>
                    <p class="text-center text-muted small">Ganti rantai, gear set, dan penyetelan transmisi</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-circle-fill"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Ban & Velg</h5>
                    <p class="text-center text-muted small">Ganti ban, tambal ban, spooring, dan balancing</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-gear-fill"></i>
                    </div>
                    <h5 class="text-center text-danger mb-3">Sparepart</h5>
                    <p class="text-center text-muted small">Jual sparepart original semua merk motor</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 text-danger mb-3"><i class="bi bi-star-fill"></i> Kenapa Pilih BrieLLaMoto?</h2>
            <p class="lead text-muted">Keunggulan bengkel kami yang membuat pelanggan puas</p>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-danger text-white rounded-circle p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-person-check-fill fs-4"></i>
                        </div>
                        <div>
                            <h5 class="text-danger mb-2">Teknisi Bersertifikat</h5>
                            <p class="text-muted mb-0">Mekanik profesional dengan sertifikat resmi dan pengalaman 10+ tahun menangani semua jenis motor</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-danger text-white rounded-circle p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-shield-fill-check fs-4"></i>
                        </div>
                        <div>
                            <h5 class="text-danger mb-2">Garansi Resmi</h5>
                            <p class="text-muted mb-0">Semua servis dan sparepart bergaransi 30 hari, jika ada masalah kami tangani gratis</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-danger text-white rounded-circle p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-tools fs-4"></i>
                        </div>
                        <div>
                            <h5 class="text-danger mb-2">Peralatan Modern</h5>
                            <p class="text-muted mb-0">Dilengkapi dengan peralatan bengkel modern dan teknologi terkini untuk hasil maksimal</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="bg-danger text-white rounded-circle p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-cash-stack fs-4"></i>
                        </div>
                        <div>
                            <h5 class="text-danger mb-2">Harga Transparan</h5>
                            <p class="text-muted mb-0">Estimasi biaya jelas sebelum servis, tidak ada biaya tersembunyi, harga bersahabat</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800" alt="Bengkel Motor" class="img-fluid rounded-4 shadow-lg" style="border: 5px solid #DC3545;">
                    <div class="position-absolute top-0 end-0 bg-danger text-white p-3 m-3 rounded-3 shadow">
                        <h3 class="mb-0 fw-bold">10+</h3>
                        <small>Tahun Pengalaman</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 text-danger mb-3"><i class="bi bi-chat-quote-fill"></i> Testimoni Pelanggan</h2>
            <p class="lead text-muted">Apa kata mereka tentang layanan kami</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted mb-3">"Bengkel terbaik! Mekaniknya profesional, harga jujur, dan motor saya jadi kencang lagi. Pasti balik lagi!"</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-danger text-white rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-person-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-danger">Budi Santoso</h6>
                                <small class="text-muted">Pemilik Honda Beat</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted mb-3">"Servis cepat, hasil memuaskan. Booking online juga mudah. Recommended banget untuk yang cari bengkel terpercaya!"</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-danger text-white rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-person-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-danger">Andi Wijaya</h6>
                                <small class="text-muted">Pemilik Yamaha NMAX</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted mb-3">"Sparepartnya original semua, teknisinya ramah dan menjelaskan detail. Harga juga masuk akal. Top!"</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-danger text-white rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-person-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-danger">Siti Nurhaliza</h6>
                                <small class="text-muted">Pemilik Scoopy</small>
                            </div>
                        </div>
                    </div>
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



