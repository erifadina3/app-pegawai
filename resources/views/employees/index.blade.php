@extends('master')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="container-fluid mt-4"> 
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Daftar Pegawai (Lengkap)</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Pegawai Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Menggunakan table-responsive agar tabel lebar bisa di-scroll --}}
            <div class="table-responsive"> 
                <table class="table table-striped table-hover table-bordered table-sm"> 
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Tanggal Masuk</th> 
                            <th>Departemen</th> {{-- Tambahan 1 --}}
                            <th>Jabatan</th>    {{-- Tambahan 2 --}}
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->nomor_telepon ?? '-' }}</td>
                            <td>{{ $employee->tanggal_lahir ?? '-' }}</td>
                            <td>{{ Str::limit($employee->alamat, 30) ?? '-' }}</td> {{-- Membatasi alamat agar tidak terlalu lebar --}}
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
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm text-white me-1">Lihat</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" 
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
