@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Edit Profil: {{ $profile->title }}</h1>
            <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Bagian Profil</label>
            <input type="text" id="title" class="form-control" value="{{ $profile->title }}" disabled>
            <small style="color: #6b7280;">Judul bagian profil tidak dapat diubah.</small>
        </div>

        <div class="form-group">
            <label for="content">Isi / Konten (Mendukung Tag HTML dasar)</label>
            <textarea name="content" id="content" rows="10" class="form-control" required>{{ old('content', $profile->content) }}</textarea>
            @error('content')
                <div style="color: #ef4444; margin-top: 0.5rem; font-size: 0.875rem;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>
</div>
@endsection
