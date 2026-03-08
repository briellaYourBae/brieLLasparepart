@extends('layouts.admin')

@section('title', 'Produk Melon')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">Produk Melon</h2>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    @forelse($produks as $produk)
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            @if($produk->foto_produk)
                <img src="{{ asset('storage/' . $produk->foto_produk) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $produk->nama_produk }}">
            @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="bi bi-image fs-1"></i>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title text-success">{{ $produk->nama_produk }}</h5>
                <p class="text-muted small">{{ Str::limit($produk->deskripsi, 80) }}</p>
                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-bold text-warning">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                    <span class="badge bg-success">Stok: {{ $produk->stok }}</span>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.produk.edit', $produk) }}" class="btn btn-sm btn-warning flex-fill">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('admin.produk.destroy', $produk) }}" method="POST" class="flex-fill">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">Belum ada produk</div>
    </div>
    @endforelse
</div>
@endsection
