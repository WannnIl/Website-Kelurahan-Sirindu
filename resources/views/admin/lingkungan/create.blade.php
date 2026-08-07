@extends('admin.layouts.app')

@section('title', 'Tambah Data Lingkungan')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Tambah Data Lingkungan</h1>
            <a href="{{ route('admin.lingkungan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <form action="{{ route('admin.lingkungan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Lingkungan *</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="Contoh: Lingkungan I">
            @error('name')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Luas Wilayah</label>
            <input type="text" name="area_size" class="form-control" value="{{ old('area_size') }}" placeholder="Contoh: 15 Hektar">
            @error('area_size')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Jumlah Penduduk / Populasi</label>
            <input type="text" name="population" class="form-control" value="{{ old('population') }}" placeholder="Contoh: 1.200 Jiwa">
            @error('population')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Mata Pencaharian Utama</label>
            <input type="text" name="livelihood" class="form-control" value="{{ old('livelihood') }}" placeholder="Contoh: Petani, Pedagang">
            @error('livelihood')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Deskripsi Tambahan</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Foto Lingkungan (Opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn">Simpan Data</button>
        </div>
    </form>
</div>
@endsection
