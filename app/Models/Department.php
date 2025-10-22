<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // Nama kolom hanya 'nama_departemen' di migrasi (tanpa deskripsi)
    protected $fillable = [
        'nama_departemen',
    ];

    /**
     * Relasi: Departemen memiliki banyak Karyawan.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'departemen_id');
    }
}
