@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Edit Perangkat Kelurahan</h1>
            <a href="{{ route('admin.officials.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.officials.update', $official->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $official->name) }}" required>
            @error('name') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="position">Jabatan</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $official->position) }}" required>
            @error('position') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="order_number">Urutan Tampil</label>
            <input type="number" name="order_number" id="order_number" class="form-control" value="{{ old('order_number', $official->order_number) }}">
        </div>

        <div class="form-group">
            <label for="photo">Foto (Opsional, biarkan kosong jika tidak ingin mengubah)</label>
            @if($official->photo)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $official->photo) }}" width="100">
                </div>
            @endif
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            @error('photo') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>
</div>
@endsection
