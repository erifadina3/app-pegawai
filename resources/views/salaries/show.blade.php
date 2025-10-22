@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title mb-4">Detail Gaji: {{ $salary->employee->nama_lengkap ?? 'N/A' }}</h1>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 25%;">Karyawan</th>
                        <td>{{ $salary->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                    </tr>
                    <tr>
                        <th>Periode Gaji</th>
                        <td>{{ $salary->bulan }}</td>
                    </tr>
                    <tr>
                        <th>Gaji Pokok</th>
                        <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Tunjangan</th>
                        <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Potongan</th>
                        <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total Gaji Bersih</th>
                        <td><span class="badge bg-success fs-6">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</span></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary me-2">Kembali ke Daftar</a>
            <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
