@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title text-center mb-4">Input Gaji Baru</h1>
        
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="karyawan_id" class="form-label">Karyawan</label>
                    <select class="form-select @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->id }})
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="bulan" class="form-label">Periode Bulan/Tahun (Contoh: Okt 2025)</label>
                    <input type="text" class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan" value="{{ old('bulan') }}" required>
                    @error('bulan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp)</label>
                    <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}" required min="0">
                    @error('gaji_pokok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan (Rp)</label>
                    <input type="number" class="form-control @error('tunjangan') is-invalid @enderror" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', 0) }}" min="0">
                    @error('tunjangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="potongan" class="form-label">Potongan (Rp)</label>
                    <input type="number" class="form-control @error('potongan') is-invalid @enderror" id="potongan" name="potongan" value="{{ old('potongan', 0) }}" min="0">
                    @error('potongan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="total_gaji" class="form-label">Total Gaji Bersih (Rp)</label>
                    <input type="number" class="form-control @error('total_gaji') is-invalid @enderror" id="total_gaji" name="total_gaji" value="{{ old('total_gaji') }}" required min="0">
                    @error('total_gaji')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Gaji</button>
            </div>
        </form>
    </div>
</div>
@endsection
