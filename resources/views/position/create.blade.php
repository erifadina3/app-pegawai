@extends('master')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title text-center mb-4">Tambah Jabatan Baru</h1>
        
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}" required>
                @error('nama_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

              <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok (Angka)</label>
                <input type="number" step="any" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}" min="0">
                @error('gaji_pokok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="gaji_pokokHelp" class="form-text">Masukkan tanpa tanda titik atau koma (e.g., 5000000).</div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
