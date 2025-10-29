@extends('master')

@section('title', 'Daftar Penggajian')
@section('title_content', 'Data Penggajian') 

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Daftar Penggajian</h1>
    <a href="{{ route('salaries.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Input Gaji
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-navy">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Karyawan</th>
                <th scope="col">Bulan</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Tunjangan</th>
                <th scope="col">Potongan</th>
                <th scope="col">Total Gaji</th>
                <th scope="col">Aksi</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
            <tr>
                <td>{{ $salary->id }}</td>
                <td>{{ $salary->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                <td>{{ $salary->bulan }}</td>
                <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                <td><span class="badge bg-success fs-6">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</span></td>
                <td>
                    <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-warning btn-sm" title="Edit Data">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('salaries.destroy', $salary) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data">
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