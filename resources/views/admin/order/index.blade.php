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
                    @forelse($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->nama_pemesan }}<br><small class="text-muted">{{ $order->no_telepon }}</small></td>
                        <td>{{ $order->sparepart->nama_produk ?? '-' }}</td>
                        <td>{{ $order->jumlah }}</td>
                        <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td>
                            @if($order->metode_pengambilan == 'pickup')
                                <span class="badge bg-info">Pickup</span>
                            @else
                                <span class="badge bg-primary">Delivery</span>
                            @endif
                        </td>
                        <td>
                            @if($order->metode_pembayaran == 'tunai')
                                <span class="badge bg-secondary">Tunai</span>
                            @else
                                <span class="badge bg-success">Transfer</span>
                            @endif
                        </td>
                        <td>
                            @if($order->dp_dibayar > 0)
                                Rp {{ number_format($order->dp_dibayar, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($order->bukti_pembayaran)
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#buktiModal{{ $order->id }}">
                                    <i class="bi bi-image"></i> Lihat
                                </button>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($order->tanggal_ambil)
                                {{ $order->tanggal_ambil }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($order->status == 'diproses')
                                <span class="badge bg-info">Diproses</span>
                            @elseif($order->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dibatalkan</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.order.updateStatus', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $order->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                            <form action="{{ route('admin.order.destroy', $order) }}" method="POST" class="d-inline">
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

<!-- Modal Bukti Pembayaran -->
@foreach($orders as $order)
    @if($order->bukti_pembayaran)
    <div class="modal fade" id="buktiModal{{ $order->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Bukti Pembayaran - {{ $order->nama_pemesan }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid" style="max-height: 600px;">
                    <div class="mt-3">
                        <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download / Buka di Tab Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach
@endsection


