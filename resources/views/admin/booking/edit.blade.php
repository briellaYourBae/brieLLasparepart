@extends('layouts.admin')

@section('title', 'Edit Data Panen')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-success">Edit Data Panen</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.panen.update', $panen) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tanggal Panen</label>
                <input type="date" name="tanggal_panen" class="form-control @error('tanggal_panen') is-invalid @enderror" value="{{ old('tanggal_panen', $panen->tanggal_panen->format('Y-m-d')) }}" required>
                @error('tanggal_panen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Panen (Kg)</label>
                <input type="number" name="jumlah_panen" class="form-control @error('jumlah_panen') is-invalid @enderror" value="{{ old('jumlah_panen', $panen->jumlah_panen) }}" required>
                @error('jumlah_panen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kualitas</label>
                <select name="kualitas" class="form-select @error('kualitas') is-invalid @enderror" required>
                    <option value="">Pilih Kualitas</option>
                    <option value="Premium" {{ old('kualitas', $panen->kualitas) == 'Premium' ? 'selected' : '' }}>Premium</option>
                    <option value="Super" {{ old('kualitas', $panen->kualitas) == 'Super' ? 'selected' : '' }}>Super</option>
                    <option value="Reguler" {{ old('kualitas', $panen->kualitas) == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                </select>
                @error('kualitas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan', $panen->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.panen.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
