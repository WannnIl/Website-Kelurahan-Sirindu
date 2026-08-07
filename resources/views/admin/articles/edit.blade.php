@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Edit Berita & Kegiatan</h1>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Judul Berita</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="content">Isi Berita</label>
            <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $article->content) }}</textarea>
            @error('content') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="image">Foto Sampul (Opsional, biarkan kosong jika tidak ingin mengubah)</label>
            @if($article->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $article->image) }}" width="200" style="border-radius:4px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>
</div>
@endsection
