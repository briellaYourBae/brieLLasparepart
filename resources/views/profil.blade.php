@extends('layouts.app')

@section('title', 'Tentang Kami - BrieLLaSparepart')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
    .section-title {
        color: #DC3545;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="fw-bold">🏍️ Tentang Kami</h1>
        <p class="lead">BrieLLaSparepart - Bengkel Motor Terpercaya</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!-- Tentang Bengkel -->
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-title">Tentang BrieLLaSparepart</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <p class="text-muted">BrieLLaSparepart adalah bengkel motor yang berdiri sejak tahun 2015. Kami berkomitmen memberikan pelayanan terbaik untuk kendaraan roda 2 Anda dengan mekanik profesional dan berpengalaman.</p>
                        <p class="text-muted">Kami menyediakan berbagai sparepart original dan berkualitas untuk semua merk motor, serta layanan servis yang cepat dan terpercaya dengan harga yang kompetitif.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layanan Kami -->
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-title">Layanan Kami</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-danger"><i class="bi bi-gear-fill"></i> Penjualan Sparepart</h5>
                                <ul class="text-muted">
                                    <li>Sparepart original semua merk</li>
                                    <li>Oli mesin berkualitas</li>
                                    <li>Ban motor berbagai ukuran</li>
                                    <li>Aki motor</li>
                                    <li>Aksesoris motor</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-danger"><i class="bi bi-tools"></i> Servis Motor</h5>
                                <ul class="text-muted">
                                    <li>Servis berkala</li>
                                    <li>Tune up mesin</li>
                                    <li>Ganti oli & filter</li>
                                    <li>Perbaikan mesin</li>
                                    <li>Ganti ban & balancing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keunggulan -->
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-title">Keunggulan Kami</h2>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card border-danger h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-patch-check text-danger fs-1"></i>
                                <h5 class="text-danger mt-3">Sparepart Original</h5>
                                <p class="text-muted small">Jaminan keaslian produk</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-people text-danger fs-1"></i>
                                <h5 class="text-danger mt-3">Mekanik Ahli</h5>
                                <p class="text-muted small">Berpengalaman & tersertifikasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-cash-coin text-danger fs-1"></i>
                                <h5 class="text-danger mt-3">Harga Bersaing</h5>
                                <p class="text-muted small">Harga terjangkau & transparan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-clock-history text-danger fs-1"></i>
                                <h5 class="text-danger mt-3">Servis Cepat</h5>
                                <p class="text-muted small">Pengerjaan tepat waktu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Misi -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title">Visi & Misi</h2>
                <div class="card bg-danger text-white border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-3">"Menjadi Bengkel Motor Terpercaya dan Pilihan Utama Masyarakat"</h4>
                        <p class="mb-3">Untuk mewujudkan visi tersebut, kami berkomitmen pada:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Memberikan pelayanan terbaik kepada pelanggan</li>
                                    <li>Menyediakan sparepart berkualitas</li>
                                    <li>Meningkatkan kompetensi mekanik</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Menggunakan peralatan modern</li>
                                    <li>Harga yang kompetitif dan transparan</li>
                                    <li>Kepuasan pelanggan adalah prioritas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #4CAF50, #81C784);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
    .section-title {
        color: #4CAF50;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="fw-bold">🏘️ Profil Desa</h1>
        <p class="lead">Desa Wirausaha Berbasis Pertanian Modern</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!-- Sejarah Desa -->
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-title">Sejarah Desa</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <p class="text-muted">Desa kami memiliki sejarah panjang dalam bidang pertanian sejak tahun 1950-an. Awalnya, desa ini dikenal sebagai penghasil padi dan palawija. Namun, seiring perkembangan zaman dan tantangan perubahan iklim, pada tahun 2020 kami mulai bertransformasi menuju pertanian modern.</p>
                        <p class="text-muted">Pada tahun 2022, melalui program Golden Strategy, kami memulai era baru dengan mengembangkan budidaya Melon Golden Aroma menggunakan teknologi hidroponik. Transformasi ini tidak hanya mengubah cara bertani, tetapi juga meningkatkan kesejahteraan masyarakat desa secara signifikan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kelompok Wanita Tani -->
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-title">Kelompok Wanita Tani (KWT)</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <p class="text-muted">Kelompok Wanita Tani (KWT) "Mekar Sari" adalah tulang punggung program Golden Strategy. Dibentuk pada tahun 2022, KWT kami beranggotakan 25 ibu rumah tangga yang berdedikasi mengembangkan usaha pertanian melon hidroponik.</p>
                        <p class="text-muted mb-3">KWT kami aktif dalam:</p>
                        <ul class="text-muted">
                            <li>Budidaya dan perawatan melon hidroponik</li>
                            <li>Pengemasan dan branding produk</li>
                            <li>Pemasaran dan distribusi</li>
                            <li>Pelatihan dan pengembangan SDM</li>
                            <li>Inovasi produk turunan melon</li>
                        </ul>
                        <p class="text-muted">Melalui KWT, para anggota tidak hanya mendapatkan penghasilan tambahan, tetapi juga mengembangkan keterampilan wirausaha dan manajemen bisnis.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Potensi Desa -->
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-title">Potensi Desa</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <h5 class="text-success"><i class="bi bi-geo-alt-fill"></i> Lokasi Strategis</h5>
                                <p class="text-muted mb-0">Terletak di dataran tinggi dengan akses mudah ke kota, memudahkan distribusi produk ke pasar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <h5 class="text-success"><i class="bi bi-droplet-fill"></i> Sumber Air Melimpah</h5>
                                <p class="text-muted mb-0">Memiliki sumber air bersih yang melimpah, sangat mendukung sistem hidroponik.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <h5 class="text-success"><i class="bi bi-people-fill"></i> SDM Berkualitas</h5>
                                <p class="text-muted mb-0">Masyarakat yang antusias belajar teknologi baru dan berkomitmen pada pertanian modern.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <h5 class="text-success"><i class="bi bi-sun-fill"></i> Iklim Ideal</h5>
                                <p class="text-muted mb-0">Iklim dan suhu yang cocok untuk budidaya melon berkualitas premium.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Desa Wirausaha -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title">Visi Desa Wirausaha</h2>
                <div class="card bg-success text-white border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-3">"Menjadi Desa Wirausaha Mandiri dan Sejahtera Berbasis Pertanian Hidroponik Modern pada Tahun 2030"</h4>
                        <p class="mb-3">Untuk mewujudkan visi tersebut, kami berkomitmen pada:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Pengembangan teknologi pertanian berkelanjutan</li>
                                    <li>Pemberdayaan ekonomi masyarakat</li>
                                    <li>Peningkatan kualitas produk</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Perluasan pasar dan jaringan distribusi</li>
                                    <li>Inovasi produk dan diversifikasi usaha</li>
                                    <li>Pelestarian lingkungan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
