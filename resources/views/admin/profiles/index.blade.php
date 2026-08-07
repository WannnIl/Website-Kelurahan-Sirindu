@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h1>Manajemen Profil</h1>
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
                    <th>No</th>
                    <th>Bagian Profil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $index => $profile)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $profile->title }}</td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
