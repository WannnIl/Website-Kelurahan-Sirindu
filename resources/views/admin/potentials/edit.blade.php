@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Edit Potensi & UMKM</h1>
            <a href="{{ route('admin.potentials.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.potentials.update', $potential->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Judul Potensi / Nama UMKM</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $potential->title) }}" required>
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $potential->description) }}</textarea>
            @error('description') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="image">Foto (Opsional, biarkan kosong jika tidak ingin mengubah)</label>
            @if($potential->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $potential->image) }}" width="150" style="border-radius:4px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>
</div>
@endsection
