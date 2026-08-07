@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Edit Agenda Kegiatan</h1>
            <a href="{{ route('admin.agendas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <form action="{{ route('admin.agendas.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Nama Kegiatan</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $agenda->title) }}" required>
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $agenda->date) }}" required>
            @error('date') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="time">Waktu (Opsional, format HH:mm)</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ old('time', $agenda->time ? \Carbon\Carbon::parse($agenda->time)->format('H:i') : '') }}">
            @error('time') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $agenda->location) }}" required>
            @error('location') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="description">Keterangan / Deskripsi (Opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $agenda->description) }}</textarea>
            @error('description') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>
</div>
@endsection
