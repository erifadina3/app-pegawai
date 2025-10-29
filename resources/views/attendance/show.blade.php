@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title mb-4">Detail Kehadiran: {{ $attendance->employee->nama_lengkap ?? 'N/A' }}</h1>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 25%;">Karyawan</th>
                        <td>{{ $attendance->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $attendance->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Masuk</th>
                        <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Keluar</th>
                        <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status Absensi</th>
                        <td>
                            @php
                                $badgeClass = match($attendance->status_absensi) {
                                    'hadir' => 'bg-success',
                                    'izin' => 'bg-warning text-dark',
                                    'sakit' => 'bg-info',
                                    'alpha' => 'bg-danger',
                                    default => 'bg-secondary'
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($attendance->status_absensi) }}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary me-2">Kembali ke Daftar</a>
            <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
