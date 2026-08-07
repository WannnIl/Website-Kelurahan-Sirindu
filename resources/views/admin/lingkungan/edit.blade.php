@extends('admin.layouts.app')

@section('title', 'Edit Data Lingkungan')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Edit Data Lingkungan</h1>
            <a href="{{ route('admin.lingkungan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <form action="{{ route('admin.lingkungan.update', $lingkungan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nama Lingkungan *</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $lingkungan->name) }}" placeholder="Contoh: Lingkungan I">
            @error('name')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Luas Wilayah</label>
            <input type="text" name="area_size" class="form-control" value="{{ old('area_size', $lingkungan->area_size) }}" placeholder="Contoh: 15 Hektar">
            @error('area_size')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Jumlah Penduduk / Populasi</label>
            <input type="text" name="population" class="form-control" value="{{ old('population', $lingkungan->population) }}" placeholder="Contoh: 1.200 Jiwa">
            @error('population')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Mata Pencaharian Utama</label>
            <input type="text" name="livelihood" class="form-control" value="{{ old('livelihood', $lingkungan->livelihood) }}" placeholder="Contoh: Petani, Pedagang">
            @error('livelihood')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Deskripsi Tambahan</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $lingkungan->description) }}</textarea>
            @error('description')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Foto Lingkungan (Opsional)</label>
            @if($lingkungan->image)
                <div style="margin-bottom: 0.5rem;">
                    <img src="{{ asset('storage/' . $lingkungan->image) }}" alt="Foto Lingkungan" style="width: 200px; border-radius: 4px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <small style="color: #6b7280;">Kosongkan jika tidak ingin mengubah gambar.</small>
            @error('image')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn">Perbarui Data</button>
        </div>
    </form>
</div>
@endsection
