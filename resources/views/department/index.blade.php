@extends('master')

@section('title', 'Daftar Departemen')
@section('title_content', 'Data Departemen') 

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Daftar Departemen</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Departemen
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
            <th scope="col">Nama Departemen</th>
            <th scope="col">Aksi</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $department->nama_departemen }}</td>
            <td>
                <a href="{{ route('departments.show', $department) }}" class="btn btn-info btn-sm text-white" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning btn-sm" title="Edit Data">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus departemen ini?')" title="Hapus Data">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection