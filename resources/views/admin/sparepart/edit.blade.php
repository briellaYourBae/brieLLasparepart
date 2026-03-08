@extends('layouts.admin')

@section('title', 'Edit Sparepart')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-danger">Edit Sparepart</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.sparepart.update', $sparepart) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $sparepart->nama_produk) }}" required>
                @error('nama_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $sparepart->harga) }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $sparepart->stok) }}" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $sparepart->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Produk</label>
                @if($sparepart->foto_produk)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $sparepart->foto_produk) }}" alt="{{ $sparepart->nama_produk }}" style="max-width: 200px;" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" name="foto_produk" class="form-control @error('foto_produk') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                @error('foto_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.sparepart.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
