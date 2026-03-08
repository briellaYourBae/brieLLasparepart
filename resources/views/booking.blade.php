@extends('layouts.app')

@section('title', 'Booking Servis - BrieLLaSparepart')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="fw-bold">🔧 Booking Servis Motor</h1>
        <p class="lead">Reservasi Servis Motor Anda dengan Mudah</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Form Booking Servis</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="1">
                            <input type="hidden" name="metode_pengambilan" value="ambil_sendiri">
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_pemesan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No. Telepon/WhatsApp</label>
                                <input type="text" name="no_telepon" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Motor</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Contoh: Honda Beat 2020" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Servis</label>
                                <select class="form-select" required>
                                    <option value="">Pilih Jenis Servis</option>
                                    <option value="servis_ringan">Servis Ringan (Ganti Oli)</option>
                                    <option value="servis_berkala">Servis Berkala</option>
                                    <option value="tune_up">Tune Up</option>
                                    <option value="ganti_ban">Ganti Ban</option>
                                    <option value="perbaikan">Perbaikan/Troubleshooting</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Booking</label>
                                <input type="date" name="tanggal_ambil" class="form-control" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keluhan/Catatan</label>
                                <textarea class="form-control" rows="3" placeholder="Jelaskan keluhan atau kebutuhan servis Anda"></textarea>
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
                        <div class="card text-center p-3">
                            <i class="bi bi-clock text-danger fs-1"></i>
                            <h6 class="mt-2">Jam Operasional</h6>
                            <small class="text-muted">Senin-Sabtu<br>08:00 - 17:00</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center p-3">
                            <i class="bi bi-geo-alt text-danger fs-1"></i>
                            <h6 class="mt-2">Lokasi Bengkel</h6>
                            <small class="text-muted">Jl. Raya Motor No. 123</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center p-3">
                            <i class="bi bi-telephone text-danger fs-1"></i>
                            <h6 class="mt-2">Hubungi Kami</h6>
                            <small class="text-muted">0812-3456-7890</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
