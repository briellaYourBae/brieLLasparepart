@extends('layouts.app')

@section('title', 'Booking Servis - BrieLLaMoto')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #DC3545, #212529);
        color: white;
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=1920') center/cover;
        opacity: 0.15;
    }
    .page-header h1 {
        position: relative;
        z-index: 1;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
    }
    .booking-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .info-card {
        border: 2px solid #f0f0f0;
        border-radius: 15px;
        transition: all 0.3s;
    }
    .info-card:hover {
        border-color: #DC3545;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(220,53,69,0.15);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <div class="mb-3">
            <i class="bi bi-calendar-check-fill fs-1"></i>
        </div>
        <h1 class="fw-bold display-4 mb-3">Booking Servis Motor</h1>
        <p class="lead">Reservasi servis motor Anda dengan mudah dan cepat, tanpa antri</p>
        <div class="d-flex justify-content-center gap-4 mt-4">
            <div class="text-center">
                <i class="bi bi-person-check fs-3"></i>
                <p class="mb-0 small mt-2">Teknisi Ahli</p>
            </div>
            <div class="text-center">
                <i class="bi bi-tools fs-3"></i>
                <p class="mb-0 small mt-2">Peralatan Modern</p>
            </div>
            <div class="text-center">
                <i class="bi bi-shield-check fs-3"></i>
                <p class="mb-0 small mt-2">Garansi 30 Hari</p>
            </div>
        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg booking-card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Form Booking Servis</h5>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Data Tidak Valid!',
                                        html: '<strong>Masukkan data yang benar:</strong><br>{{ $errors->first() }}',
                                        confirmButtonColor: '#DC3545',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            </script>
                        @endif
                        
                        @if(session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Booking Berhasil!',
                                        html: '<strong>{{ session('success') }}</strong>',
                                        confirmButtonColor: '#DC3545',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            </script>
                        @endif
                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No. Telepon/WhatsApp</label>
                                <input type="text" name="no_hp" class="form-control" pattern="[0-9]{10,15}" title="Nomor telepon harus berupa angka 10-15 digit" required>
                                <small class="text-muted">Minimal 10 digit, hanya angka</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Motor</label>
                                <input type="text" name="motor" class="form-control" placeholder="Contoh: Honda Beat 2020" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Servis</label>
                                <select name="jenis_servis" class="form-select" required>
                                    <option value="">Pilih Jenis Servis</option>
                                    <option value="Servis Ringan">Servis Ringan (Ganti Oli)</option>
                                    <option value="Servis Berkala">Servis Berkala</option>
                                    <option value="Tune Up">Tune Up</option>
                                    <option value="Ganti Ban">Ganti Ban</option>
                                    <option value="Perbaikan">Perbaikan/Troubleshooting</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Booking</label>
                                <input type="date" name="tanggal_booking" class="form-control" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keluhan/Catatan</label>
                                <textarea name="keluhan" class="form-control" rows="3" placeholder="Jelaskan keluhan atau kebutuhan servis Anda"></textarea>
                            </div>
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> <strong>Info:</strong> Kami akan menghubungi Anda untuk konfirmasi jadwal servis.
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg w-100">
                                <i class="bi bi-calendar-check"></i> Booking Sekarang
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row mt-4 g-3">
                    <div class="col-md-4">
                        <div class="card info-card text-center p-4">
                            <i class="bi bi-clock-fill text-danger fs-1 mb-3"></i>
                            <h6 class="fw-bold text-danger">Jam Operasional</h6>
                            <small class="text-muted">Senin - Sabtu<br>08:00 - 17:00 WIB</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card info-card text-center p-4">
                            <i class="bi bi-geo-alt-fill text-danger fs-1 mb-3"></i>
                            <h6 class="fw-bold text-danger">Lokasi Bengkel</h6>
                            <small class="text-muted">Jl. Raya Motor No. 123<br>Kota</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card info-card text-center p-4">
                            <i class="bi bi-whatsapp text-danger fs-1 mb-3"></i>
                            <h6 class="fw-bold text-danger">Hubungi Kami</h6>
                            <small class="text-muted">0812-3456-7890<br>WhatsApp 24/7</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


