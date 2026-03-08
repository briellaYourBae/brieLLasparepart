@extends('layouts.app')

@section('title', $article->judul . ' - BrieLLaSparepart')

@section('styles')
<style>
    .article-header {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 60px 0;
    }
    .article-featured-img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 15px;
    }
    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: justify;
    }
    .article-meta {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
</style>
@endsection

@section('content')
<div class="article-header">
    <div class="container">
        <h1 class="fw-bold">{{ $article->judul }}</h1>
        <p class="mb-0"><i class="bi bi-calendar"></i> {{ $article->created_at->format('d F Y') }} | <i class="bi bi-person"></i> {{ $article->user->name }}</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="article-meta">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-calendar text-danger"></i> {{ $article->created_at->format('d F Y') }}</span>
                        <span><i class="bi bi-person text-danger"></i> {{ $article->user->name }}</span>
                    </div>
                </div>

                @if($article->foto)
                    <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" class="article-featured-img shadow mb-4">
                @endif
                
                <div class="article-content">
                    {!! nl2br(e($article->konten)) !!}
                </div>

                <hr class="my-5">

                <div class="text-center">
                    <a href="{{ route('article') }}" class="btn btn-danger btn-lg">
                        <i class="bi bi-arrow-left"></i> Kembali ke Artikel
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
