@extends('master')

@section('title', 'Detail Pegawai')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title mb-4">Detail Pegawai: {{ $employee->nama_lengkap }}</h1>
        
        <div class="row">
            <div class="col-md-12">
                {{-- Menggunakan class table-bordered dan table-striped untuk tampilan rapi --}}
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 25%;">Nama Lengkap</th>
                        <td>{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $employee->nomor_telepon ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $employee->tanggal_lahir ?? '-' }}</td>
                    </tr>
                    {{-- Detail Departemen dan Jabatan --}}
                    <tr>
                        <th>Departemen</th>
                        <td>{{ $employee->department->nama_departemen ?? 'N/A (Data Hilang)' }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $employee->position->nama_jabatan ?? 'N/A (Data Hilang)' }}</td>
                    </tr>
                    {{------------------------------------------------}}
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $employee->tanggal_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $employee->alamat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                             {{-- Menggunakan Badge Bootstrap untuk Status --}}
                             @if(strtolower($employee->status) == 'aktif')
                                <span class="badge bg-success">{{ $employee->status }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $employee->status }}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary me-2">Kembali ke Daftar</a>
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit Data Pegawai</a>
        </div>
    </div>
</div>
@endsection