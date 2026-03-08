@extends('layouts.admin')

@section('title', 'Data Panen')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">Data Panen</h2>
    <a href="{{ route('admin.panen.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Data Panen
    </a>
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
                        <th>Tanggal Panen</th>
                        <th>Jumlah Panen (Kg)</th>
                        <th>Kualitas</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($panens as $index => $panen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $panen->tanggal_panen->format('d/m/Y') }}</td>
                        <td>{{ $panen->jumlah_panen }} kg</td>
                        <td>
                            @if($panen->kualitas == 'Premium')
                                <span class="badge bg-success">{{ $panen->kualitas }}</span>
                            @elseif($panen->kualitas == 'Super')
                                <span class="badge bg-warning text-dark">{{ $panen->kualitas }}</span>
                            @else
                                <span class="badge bg-info">{{ $panen->kualitas }}</span>
                            @endif
                        </td>
                        <td>{{ $panen->keterangan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.panen.edit', $panen) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.panen.destroy', $panen) }}" method="POST" class="d-inline">
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
                        <td colspan="6" class="text-center text-muted">Belum ada data panen</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
