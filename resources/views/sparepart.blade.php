@extends('layouts.app')

@section('title', 'Sparepart Motor - BrieLLaMoto')

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
    .product-card {
        border: 2px solid #f0f0f0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        transition: all 0.4s;
        height: 100%;
        background: white;
    }
    .product-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 15px 40px rgba(220,53,69,0.25);
        border-color: #DC3545;
    }
    .product-img {
        height: 280px;
        object-fit: cover;
        border-bottom: 3px solid #FD7E14;
    }
    .badge-stock {
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
    }
    .price-tag {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 10px 20px;
        border-radius: 15px;
        display: inline-block;
        font-size: 1.3rem;
        font-weight: 800;
        box-shadow: 0 5px 15px rgba(220,53,69,0.3);
    }
    .btn-order {
        background: linear-gradient(135deg, #DC3545, #FD7E14);
        border: none;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-order:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(220,53,69,0.4);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <div class="mb-3">
            <i class="bi bi-gear-fill fs-1"></i>
        </div>
        <h1 class="fw-bold display-4 mb-3">Sparepart Motor Original</h1>
        <p class="lead">Sparepart berkualitas tinggi dengan harga terjangkau dan bergaransi resmi</p>
        <div class="d-flex justify-content-center gap-4 mt-4">
            <div class="text-center">
                <i class="bi bi-shield-check fs-3"></i>
                <p class="mb-0 small mt-2">100% Original</p>
            </div>
            <div class="text-center">
                <i class="bi bi-award fs-3"></i>
                <p class="mb-0 small mt-2">Bergaransi</p>
            </div>
            <div class="text-center">
                <i class="bi bi-truck fs-3"></i>
                <p class="mb-0 small mt-2">Bisa Diantar</p>
            </div>
        </div>
    </div>
</div>

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
                title: 'Pesanan Berhasil!',
                html: '<strong>{{ session('success') }}</strong>',
                confirmButtonColor: '#DC3545',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if(session('error'))
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($spareparts as $sparepart)
            <div class="col-md-4">
                <div class="card product-card">
                    @if($sparepart->foto_produk)
                        <img src="{{ asset('storage/' . $sparepart->foto_produk) }}" class="card-img-top product-img" alt="{{ $sparepart->nama_produk }}">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center product-img">
                            <i class="bi bi-image fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <h5 class="card-title text-danger fw-bold mb-2">{{ $sparepart->nama_produk }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit($sparepart->deskripsi, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="price-tag">Rp {{ number_format($sparepart->harga, 0, ',', '.') }}</div>
                            <span class="badge badge-stock"><i class="bi bi-box-seam"></i> Stok: {{ $sparepart->stok }}</span>
                        </div>
                        <button class="btn btn-danger btn-order w-100" data-bs-toggle="modal" data-bs-target="#pesanModal{{ $sparepart->id }}">
                            <i class="bi bi-cart-plus-fill"></i> Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Pesan -->
            <div class="modal fade" id="pesanModal{{ $sparepart->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Pesan {{ $sparepart->nama_produk }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data" onsubmit="closeModal{{ $sparepart->id }}(event)">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $sparepart->id }}">
                            <input type="hidden" name="harga" value="{{ $sparepart->harga }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_pemesan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. Telepon/WhatsApp</label>
                                    <input type="text" name="no_telepon" class="form-control" pattern="[0-9]{10,15}" title="Nomor telepon harus berupa angka 10-15 digit" required>
                                    <small class="text-muted">Minimal 10 digit, hanya angka</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" min="1" value="1" id="jumlah{{ $sparepart->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Metode Pengambilan</label>
                                    <select name="metode_pengambilan" class="form-select" id="metode{{ $sparepart->id }}" required>
                                        <option value="">Pilih Metode</option>
                                        <option value="ambil_sendiri">Ambil di Bengkel</option>
                                        <option value="diantar">Diantar ke Alamat</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="alamatDiv{{ $sparepart->id }}" style="display:none;">
                                    <label class="form-label">Alamat Lengkap Pengiriman</label>
                                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3" id="pembayaranDiv{{ $sparepart->id }}" style="display:none;">
                                    <label class="form-label">Metode Pembayaran</label>
                                    <select name="metode_pembayaran" class="form-select" id="pembayaran{{ $sparepart->id }}">
                                        <option value="transfer">Transfer (DP 50%)</option>
                                    </select>
                                    <div class="alert alert-warning mt-2" id="dpInfo{{ $sparepart->id }}" style="display:none;">
                                        <strong>DP yang harus dibayar:</strong> <span id="dpAmount{{ $sparepart->id }}">Rp 0</span><br>
                                        <small>Transfer ke: BCA 1234567890 a.n. BrieLLaMoto</small>
                                    </div>
                                </div>
                                <div class="mb-3" id="buktiDiv{{ $sparepart->id }}" style="display:none;">
                                    <label class="form-label">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/jpeg,image/jpg,image/png,image/webp" id="buktiBayar{{ $sparepart->id }}">
                                    <small class="text-muted">Wajib upload bukti transfer (JPG, PNG, WEBP)</small>
                                </div>
                                <div class="mb-3" id="tanggalDiv{{ $sparepart->id }}" style="display:none;">
                                    <label class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" name="tanggal_ambil" class="form-control" id="tanggalAmbil{{ $sparepart->id }}" min="{{ date('Y-m-d') }}">
                                    <small class="text-muted">Pilih tanggal Anda akan mengambil barang</small>
                                </div>
                                <div class="alert alert-info">
                                    <strong>Harga:</strong> Rp {{ number_format($sparepart->harga, 0, ',', '.') }}<br>
                                    <strong>Total:</strong> <span id="totalHarga{{ $sparepart->id }}">Rp {{ number_format($sparepart->harga, 0, ',', '.') }}</span><br>
                                    <strong>Stok Tersedia:</strong> {{ $sparepart->stok }}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Kirim Pesanan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Belum ada sparepart tersedia</div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($spareparts as $sparepart)
        window.closeModal{{ $sparepart->id }} = function(event) {
            const modal = bootstrap.Modal.getInstance(document.getElementById('pesanModal{{ $sparepart->id }}'));
            if (modal) {
                modal.hide();
            }
        };
        
        const metode{{ $sparepart->id }} = document.getElementById('metode{{ $sparepart->id }}');
        const alamatDiv{{ $sparepart->id }} = document.getElementById('alamatDiv{{ $sparepart->id }}');
        const pembayaranDiv{{ $sparepart->id }} = document.getElementById('pembayaranDiv{{ $sparepart->id }}');
        const dpInfo{{ $sparepart->id }} = document.getElementById('dpInfo{{ $sparepart->id }}');
        const jumlah{{ $sparepart->id }} = document.getElementById('jumlah{{ $sparepart->id }}');
        const totalHarga{{ $sparepart->id }} = document.getElementById('totalHarga{{ $sparepart->id }}');
        const dpAmount{{ $sparepart->id }} = document.getElementById('dpAmount{{ $sparepart->id }}');
        const hargaPerItem{{ $sparepart->id }} = {{ $sparepart->harga }};

        function updateHarga{{ $sparepart->id }}() {
            const qty = parseInt(jumlah{{ $sparepart->id }}.value) || 1;
            const total = hargaPerItem{{ $sparepart->id }} * qty;
            const dp = Math.ceil(total / 2);
            
            totalHarga{{ $sparepart->id }}.textContent = 'Rp ' + total.toLocaleString('id-ID');
            dpAmount{{ $sparepart->id }}.textContent = 'Rp ' + dp.toLocaleString('id-ID');
        }

        metode{{ $sparepart->id }}.addEventListener('change', function() {
            if (this.value === 'diantar') {
                alamatDiv{{ $sparepart->id }}.style.display = 'block';
                alamatDiv{{ $sparepart->id }}.querySelector('textarea').required = true;
                pembayaranDiv{{ $sparepart->id }}.style.display = 'block';
                dpInfo{{ $sparepart->id }}.style.display = 'block';
                document.getElementById('pembayaran{{ $sparepart->id }}').required = true;
                document.getElementById('buktiDiv{{ $sparepart->id }}').style.display = 'block';
                document.getElementById('buktiBayar{{ $sparepart->id }}').required = true;
                document.getElementById('tanggalDiv{{ $sparepart->id }}').style.display = 'none';
                document.getElementById('tanggalAmbil{{ $sparepart->id }}').required = false;
            } else if (this.value === 'ambil_sendiri') {
                alamatDiv{{ $sparepart->id }}.style.display = 'none';
                alamatDiv{{ $sparepart->id }}.querySelector('textarea').required = false;
                pembayaranDiv{{ $sparepart->id }}.style.display = 'none';
                dpInfo{{ $sparepart->id }}.style.display = 'none';
                document.getElementById('pembayaran{{ $sparepart->id }}').required = false;
                document.getElementById('buktiDiv{{ $sparepart->id }}').style.display = 'none';
                document.getElementById('buktiBayar{{ $sparepart->id }}').required = false;
                document.getElementById('tanggalDiv{{ $sparepart->id }}').style.display = 'block';
                document.getElementById('tanggalAmbil{{ $sparepart->id }}').required = true;
            } else {
                alamatDiv{{ $sparepart->id }}.style.display = 'none';
                pembayaranDiv{{ $sparepart->id }}.style.display = 'none';
                document.getElementById('buktiDiv{{ $sparepart->id }}').style.display = 'none';
                document.getElementById('tanggalDiv{{ $sparepart->id }}').style.display = 'none';
            }
        });

        jumlah{{ $sparepart->id }}.addEventListener('input', updateHarga{{ $sparepart->id }});
        updateHarga{{ $sparepart->id }}();
        @endforeach
    });
</script>
@endsection


