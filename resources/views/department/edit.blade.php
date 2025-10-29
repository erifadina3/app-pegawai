@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title text-center mb-4">Edit Departemen: {{ $department->nama_departemen }}</h1>
        
        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_departemen" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control @error('nama_departemen') is-invalid @enderror" id="nama_departemen" name="nama_departemen" value="{{ old('nama_departemen', $department->nama_departemen) }}" required>
                @error('nama_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
