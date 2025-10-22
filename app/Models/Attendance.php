<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // Nama tabel di migrasi: 'attendance' (tanpa 's')
    protected $table = 'attendance';

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];

    /**
     * Relasi: Kehadiran milik satu Karyawan.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
