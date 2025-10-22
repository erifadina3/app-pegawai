@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title text-center mb-4">Edit Data Kehadiran</h1>
        
        <form action="{{ route('attendances.update', $attendance) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="karyawan_id" class="form-label">Karyawan</label>
                    <select class="form-select @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ (old('karyawan_id', $attendance->karyawan_id) == $employee->id) ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->id }})
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" required>
                    @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                    <input type="time" class="form-control @error('waktu_masuk') is-invalid @enderror" id="waktu_masuk" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i:s') : '') }}" step="1">
                    @error('waktu_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                    <input type="time" class="form-control @error('waktu_keluar') is-invalid @enderror" id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i:s') : '') }}" step="1">
                    @error('waktu_keluar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="status_absensi" class="form-label">Status Absensi</label>
                    <select class="form-select @error('status_absensi') is-invalid @enderror" id="status_absensi" name="status_absensi" required>
                        <option value="">Pilih Status</option>
                        @foreach(['hadir', 'izin', 'sakit', 'alpha'] as $status)
                            <option value="{{ $status }}" {{ (old('status_absensi', $attendance->status_absensi) == $status) ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_absensi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Update Kehadiran</button>
            </div>
        </form>
    </div>
</div>
@endsection
