@extends('layouts.admin')

@section('title', 'Artikel Workshop')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-danger">Artikel Workshop</h2>
    <a href="{{ route('admin.article.create') }}" class="btn btn-danger">
        <i class="bi bi-plus-circle"></i> Tulis Artikel
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    @forelse($articles as $article)
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            @if($article->foto)
                <img src="{{ asset('storage/' . $article->foto) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $article->judul }}">
            @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="bi bi-image fs-1"></i>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title text-danger">{{ $article->judul }}</h5>
                <p class="text-muted small">{{ Str::limit(strip_tags($article->konten), 100) }}</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <small class="text-muted">{{ $article->created_at->format('d M Y') }}</small>
                    @if($article->status == 'published')
                        <span class="badge bg-success">Published</span>
                    @else
                        <span class="badge bg-secondary">Draft</span>
                    @endif
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.article.edit', $article) }}" class="btn btn-sm btn-warning flex-fill">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('admin.article.destroy', $article) }}" method="POST" class="flex-fill">
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
        <div class="alert alert-info text-center">Belum ada artikel</div>
    </div>
    @endforelse
</div>
@endsection


