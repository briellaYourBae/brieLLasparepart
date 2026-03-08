@extends('layouts.admin')

@section('title', 'Pesanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">Daftar Pesanan</h2>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Metode</th>
                        <th>Pembayaran</th>
                        <th>DP</th>
                        <th>Bukti</th>
                        <th>Tgl Ambil</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanans as $index => $pesanan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pesanan->nama_pemesan }}<br><small class="text-muted">{{ $pesanan->no_telepon }}</small></td>
                        <td>{{ $pesanan->produk->nama_produk }}</td>
                        <td>{{ $pesanan->jumlah }} Kg</td>
                        <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>
                            @if($pesanan->metode_pengambilan == 'ambil_sendiri')
                                <span class="badge bg-info">Ambil Sendiri</span>
                            @else
                                <span class="badge bg-primary">Diantar</span>
                            @endif
                        </td>
                        <td>
                            @if($pesanan->metode_pembayaran == 'tunai')
                                <span class="badge bg-secondary">Tunai</span>
                            @else
                                <span class="badge bg-success">Transfer</span>
                            @endif
                        </td>
                        <td>
                            @if($pesanan->dp_dibayar > 0)
                                Rp {{ number_format($pesanan->dp_dibayar, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($pesanan->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="bi bi-image"></i> Lihat
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($pesanan->tanggal_ambil)
                                {{ $pesanan->tanggal_ambil->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($pesanan->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($pesanan->status == 'diproses')
                                <span class="badge bg-info">Diproses</span>
                            @elseif($pesanan->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dibatalkan</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.pesanan.updateStatus', $pesanan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                    <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $pesanan->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                            <form action="{{ route('admin.pesanan.destroy', $pesanan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-center text-muted">Belum ada pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
