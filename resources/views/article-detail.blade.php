@extends('layouts.app')

@section('title', $article->judul . ' - BrieLLaMoto')

@section('styles')
<style>
    .article-header {
        background: linear-gradient(135deg, #DC3545, #C82333);
        color: white;
        padding: 40px 0;
    }
    .article-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }
    .article-meta {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="article-header">
    <div class="container">
        <a href="{{ route('article') }}" class="btn btn-light mb-3">
            <i class="bi bi-arrow-left"></i> Kembali ke Artikel
        </a>
        <h1 class="fw-bold">{{ $article->judul }}</h1>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="article-meta">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-calendar text-danger"></i> 
                            <strong>{{ $article->created_at->format('d F Y') }}</strong>
                        </div>
                        <div>
                            <i class="bi bi-person text-danger"></i> 
                            <strong>{{ $article->user->name }}</strong>
                        </div>
                    </div>
                </div>

                @if($article->foto)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" class="article-image">
                </div>
                @endif

                <div class="article-content">
                    {!! nl2br(e($article->konten)) !!}
                </div>

                <hr class="my-5">

                <div class="text-center">
                    <a href="{{ route('article') }}" class="btn btn-danger btn-lg">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Artikel
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


