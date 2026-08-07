@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Tambah Potensi & UMKM</h1>
            <a href="{{ route('admin.potentials.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.potentials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="title">Judul Potensi / Nama UMKM</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            @error('description') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="image">Foto (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
</div>
@endsection
