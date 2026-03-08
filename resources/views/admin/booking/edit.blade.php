@extends('layouts.admin')

@section('title', 'Edit Booking Servis')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-danger">Edit Booking Servis</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.booking.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $booking->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $booking->no_hp) }}" required>
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Motor</label>
                <input type="text" name="motor" class="form-control @error('motor') is-invalid @enderror" value="{{ old('motor', $booking->motor) }}" required>
                @error('motor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Servis</label>
                <select name="jenis_servis" class="form-select @error('jenis_servis') is-invalid @enderror" required>
                    <option value="">Pilih Jenis Servis</option>
                    <option value="Servis Ringan" {{ old('jenis_servis', $booking->jenis_servis) == 'Servis Ringan' ? 'selected' : '' }}>Servis Ringan</option>
                    <option value="Servis Berat" {{ old('jenis_servis', $booking->jenis_servis) == 'Servis Berat' ? 'selected' : '' }}>Servis Berat</option>
                    <option value="Ganti Oli" {{ old('jenis_servis', $booking->jenis_servis) == 'Ganti Oli' ? 'selected' : '' }}>Ganti Oli</option>
                    <option value="Tune Up" {{ old('jenis_servis', $booking->jenis_servis) == 'Tune Up' ? 'selected' : '' }}>Tune Up</option>
                </select>
                @error('jenis_servis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Booking</label>
                <input type="date" name="tanggal_booking" class="form-control @error('tanggal_booking') is-invalid @enderror" value="{{ old('tanggal_booking', $booking->tanggal_booking->format('Y-m-d')) }}" required>
                @error('tanggal_booking')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keluhan</label>
                <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" rows="3">{{ old('keluhan', $booking->keluhan) }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


