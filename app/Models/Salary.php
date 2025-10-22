<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'karyawan_id',
        'bulan', // Nama kolom di migrasi: 'bulan'
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji', // Nama kolom di migrasi: 'total_gaji' (bukan gaji_bersih)
    ];

    /**
     * Relasi: Data Gaji milik satu Karyawan.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
