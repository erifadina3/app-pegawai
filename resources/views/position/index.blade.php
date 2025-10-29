@extends('master')

@section('title', 'Daftar Jabatan')
@section('title_content', 'Data Jabatan') 

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Daftar Jabatan</h1>
    <a href="{{ route('positions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Jabatan
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<table class="table table-striped table-hover table-bordered table-navy">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Jabatan</th>
            <th scope="col" >Aksi</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($positions as $position)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $position->nama_jabatan }}</td>
            <td>
                <a href="{{ route('positions.show', $position) }}" class="btn btn-info btn-sm text-white" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('positions.edit', $position) }}" class="btn btn-warning btn-sm" title="Edit Data">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('positions.destroy', $position) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jabatan ini?')" title="Hapus Data">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection