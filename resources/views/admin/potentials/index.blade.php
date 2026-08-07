@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Potensi & UMKM</h1>
            <a href="{{ route('admin.potentials.create') }}" class="btn">Tambah Potensi</a>
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
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Deskripsi Singkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($potentials as $potential)
                <tr>
                    <td>
                        @if($potential->image)
                            <img src="{{ asset('storage/' . $potential->image) }}" width="60" style="border-radius:4px;">
                        @else
                            <div style="width:60px; height:60px; background:#e5e7eb; border-radius:4px; display:flex; align-items:center; justify-content:center;">-</div>
                        @endif
                    </td>
                    <td>{{ $potential->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($potential->description, 50) }}</td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('admin.potentials.edit', $potential->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.potentials.destroy', $potential->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
