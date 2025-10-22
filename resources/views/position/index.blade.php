@extends('master')

@section('title', 'Daftar Jabatan')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Daftar Jabatan</h1>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">Tambah Jabatan Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Jabatan</th>
                        <th scope="col" style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>
                            <a href="{{ route('positions.show', $position) }}" class="btn btn-info btn-sm text-white me-1">Lihat</a>
                            <a href="{{ route('positions.edit', $position) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                            <form action="{{ route('positions.destroy', $position) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jabatan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
