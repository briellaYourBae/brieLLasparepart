@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-danger">Edit Artikel</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.article.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul Artikel</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $article->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Konten</label>
                <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="10" required>{{ old('konten', $article->konten) }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Artikel</label>
                @if($article->foto)
                    <div class="mb-2">
                        <p class="fw-bold">Foto Saat Ini (250x250px):</p>
                        <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 250px; height: 250px; object-fit: cover; border-radius: 10px; border: 2px solid #DC3545;">
                    </div>
                @endif
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/jpeg,image/jpg,image/png,image/webp" id="fotoInput">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto. Ukuran akan disesuaikan 250x250px</small>
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="previewContainer" class="mt-3" style="display:none;">
                    <p class="fw-bold">Preview Foto Baru (250x250px):</p>
                    <img id="previewImage" src="" alt="Preview" style="width: 250px; height: 250px; object-fit: cover; border-radius: 10px; border: 2px solid #DC3545;">
                </div>
            </div>

            <script>
                document.getElementById('fotoInput').addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('previewImage').src = e.target.result;
                            document.getElementById('previewContainer').style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    }
                });
            </script>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
