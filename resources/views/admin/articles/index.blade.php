@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Berita & Kegiatan</h1>
            <a href="{{ route('admin.articles.create') }}" class="btn">Tambah Berita</a>
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
                    <th>Judul Berita</th>
                    <th>Tanggal Publish</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" width="80" style="border-radius:4px;">
                        @else
                            <div style="width:80px; height:50px; background:#e5e7eb; border-radius:4px; display:flex; align-items:center; justify-content:center;">-</div>
                        @endif
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
