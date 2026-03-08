@extends('layouts.app')

@section('title', 'Kontak - BrieLLaSparepart')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
    .contact-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        padding: 2rem;
        text-align: center;
        height: 100%;
    }
    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #DC3545, #C82333);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="fw-bold">📞 Hubungi Kami</h1>
        <p class="lead">Kami Siap Melayani Anda</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5 class="text-danger fw-bold">Alamat Bengkel</h5>
                    <p class="text-muted">Jl. Raya Motor No. 123<br>Kota Bandung<br>Jawa Barat 40123</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5 class="text-danger fw-bold">Telepon</h5>
                    <p class="text-muted">+62 812-3456-7890<br>+62 821-9876-5432</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5 class="text-danger fw-bold">Email</h5>
                    <p class="text-muted">info@briellasparepart.com<br>cs@briellasparepart.com</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="text-danger fw-bold mb-4 text-center">Kirim Pesan</h4>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Masukkan email Anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" placeholder="Masukkan nomor telepon">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger w-100 py-2">
                                <i class="bi bi-send-fill"></i> Kirim Pesan
                            </button>
                        </form>
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
    .contact-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        padding: 2rem;
        text-align: center;
        height: 100%;
    }
    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #4CAF50, #81C784);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="fw-bold">📞 Hubungi Kami</h1>
        <p class="lead">Kami Siap Melayani Anda</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5 class="text-success fw-bold">Alamat</h5>
                    <p class="text-muted">Desa Wirausaha<br>Kecamatan Pertanian<br>Kabupaten Hijau</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5 class="text-success fw-bold">Telepon</h5>
                    <p class="text-muted">+62 812-3456-7890<br>+62 821-9876-5432</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5 class="text-success fw-bold">Email</h5>
                    <p class="text-muted">info@goldenstrategy.com<br>admin@goldenstrategy.com</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="text-success fw-bold mb-4 text-center">Kirim Pesan</h4>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Masukkan email Anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" placeholder="Masukkan nomor telepon">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2">
                                <i class="bi bi-send-fill"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
