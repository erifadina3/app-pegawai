@extends('master')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title text-center mb-4">Edit Jabatan: {{ $position->nama_jabatan }}</h1>
        
        <form action="{{ route('positions.update', $position) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>
                @error('nama_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
