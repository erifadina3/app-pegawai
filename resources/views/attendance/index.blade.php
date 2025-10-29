@extends('master')

@section('title', 'Daftar Kehadiran')
@section('title_content', 'Data Kehadiran') 

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Daftar Kehadiran</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Data Kehadiran
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
                <th scope="col">Tanggal</th>
                <th scope="col">Masuk</th>
                <th scope="col">Keluar</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->id }}</td>
                <td>{{ $attendance->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                <td>{{ $attendance->tanggal }}</td>
                <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
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
                <td>
                    <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-warning btn-sm" title="Edit Data">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('attendances.destroy', $attendance) }}" method="POST" style="display:inline;">
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
