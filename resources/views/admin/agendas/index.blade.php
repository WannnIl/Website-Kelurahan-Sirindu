@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Agenda Kegiatan</h1>
            <a href="{{ route('admin.agendas.create') }}" class="btn">Tambah Agenda</a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Nama Kegiatan</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $agenda)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($agenda->date)->format('d M Y') }}</td>
                    <td>{{ $agenda->time ? \Carbon\Carbon::parse($agenda->time)->format('H:i') : '-' }}</td>
                    <td>{{ $agenda->title }}</td>
                    <td>{{ $agenda->location }}</td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('admin.agendas.edit', $agenda->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.agendas.destroy', $agenda->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
