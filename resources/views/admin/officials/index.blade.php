@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Perangkat Kelurahan</h1>
            <a href="{{ route('admin.officials.create') }}" class="btn">Tambah Perangkat</a>
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
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($officials as $official)
                <tr>
                    <td>
                        @if($official->photo)
                            <img src="{{ asset('storage/' . $official->photo) }}" width="50" style="border-radius:50%;">
                        @else
                            <div style="width:50px; height:50px; background:#e5e7eb; border-radius:50%; display:flex; align-items:center; justify-content:center;">-</div>
                        @endif
                    </td>
                    <td>{{ $official->name }}</td>
                    <td>{{ $official->position }}</td>
                    <td>{{ $official->order_number }}</td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('admin.officials.edit', $official->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
