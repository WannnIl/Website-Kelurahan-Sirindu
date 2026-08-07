@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Tambah Agenda Kegiatan</h1>
            <a href="{{ route('admin.agendas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.agendas.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Nama Kegiatan</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
            @error('date') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="time">Waktu (Opsional, format HH:mm)</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ old('time') }}">
            @error('time') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
            @error('location') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="description">Keterangan / Deskripsi (Opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
</div>
@endsection
