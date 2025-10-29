@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="h3 card-title mb-4">Detail Departemen</h1>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 25%;">ID</th>
                        <td>{{ $department->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Departemen</th>
                        <td>{{ $department->nama_departemen }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('departments.index') }}" class="btn btn-secondary me-2">Kembali ke Daftar</a>
            <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
