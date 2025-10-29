@extends('master')

@section('title', 'Daftar Pegawai')
@section('title_content', 'Data Karyawan') 

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Daftar Pegawai (Lengkap)</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Pegawai
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive"> 
    <table class="table table-striped table-hover table-bordered table-sm table-navy"> 
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Masuk</th> 
                <th>Departemen</th>
                <th>Jabatan</th> 
                <th>Status</th>
                <th>Aksi</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->nomor_telepon ?? '-' }}</td>
                <td>{{ $employee->tanggal_lahir ?? '-' }}</td>
                <td>{{ Str::limit($employee->alamat, 30) ?? '-' }}</td>
                <td>{{ $employee->tanggal_masuk }}</td>
                <td>{{ $employee->department->nama_departemen ?? 'N/A' }}</td>
                <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                <td>
                    @if(strtolower($employee->status) == 'aktif')
                        <span class="badge bg-success">{{ $employee->status }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $employee->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm text-white" title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm" title="Edit Data">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus Data">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection