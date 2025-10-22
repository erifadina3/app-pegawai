@extends('master')

@section('title', 'Detail Jabatan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title mb-4">Detail Jabatan</h1>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 25%;">ID</th>
                        <td>{{ $position->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Jabatan</th>
                        <td>{{ $position->nama_jabatan }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('positions.index') }}" class="btn btn-secondary me-2">Kembali ke Daftar</a>
            <a href="{{ route('positions.edit', $position) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
