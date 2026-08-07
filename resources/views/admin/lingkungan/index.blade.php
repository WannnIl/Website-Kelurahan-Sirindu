@extends('admin.layouts.app')

@section('title', 'Kelola Lingkungan')

@section('content')
<div class="page-header">
    <h1>Data Lingkungan</h1>
    <a href="{{ route('admin.lingkungan.create') }}" class="btn">Tambah Data</a>
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
                <th>Nama Lingkungan</th>
                <th>Luas Wilayah</th>
                <th>Populasi</th>
                <th>Mata Pencaharian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lingkungans as $l)
            <tr>
                <td>{{ $l->name }}</td>
                <td>{{ $l->area_size ?: '-' }}</td>
                <td>{{ $l->population ?: '-' }}</td>
                <td>{{ $l->livelihood ?: '-' }}</td>
                <td>
                    <div class="action-group">
                        <a href="{{ route('admin.lingkungan.edit', $l->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.lingkungan.destroy', $l->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
@endsection
