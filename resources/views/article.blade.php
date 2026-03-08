@extends('layouts.app')

@section('title', 'Artikel Workshop - BrieLLaSparepart')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
    .article-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .article-card:hover {
        transform: translateY(-10px);
    }
    .article-img {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
    .article-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .article-text {
        flex: 1;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="fw-bold">📰 Artikel Workshop</h1>
        <p class="lead">Tips & Informasi Seputar Perawatan Motor</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card article-card">
                    @if($article->foto)
                        <img src="{{ asset('storage/' . $article->foto) }}" class="article-img" alt="{{ $article->judul }}">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center article-img">
                            <i class="bi bi-image fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body article-body">
                        <div class="article-text">
                            <small class="text-muted"><i class="bi bi-calendar"></i> {{ $article->created_at->format('d F Y') }}</small>
                            <h5 class="card-title text-danger fw-bold mt-2">{{ $article->judul }}</h5>
                            <p class="text-muted">{{ Str::limit(strip_tags($article->konten), 100) }}</p>
                        </div>
                        <a href="{{ route('article.show', $article->slug) }}" class="btn btn-danger w-100 mt-3">
                            Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Belum ada artikel tersedia</div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
