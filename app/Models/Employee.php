<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
       protected $fillable = [ 
        'nama_lengkap', 
        'email', 
        'nomor_telepon', 
        'tanggal_lahir', 
        'alamat', 
        'tanggal_masuk', 
        'status', 
        'departemen_id',  //ditambahkan sesuai add_foreign_keys_to_employees_table
        'jabatan_id',  //ditambahkan sesuai add_foreign_keys_to_employees_table
    ]; 
    
    /**
     * Relasi: Karyawan milik satu Departemen.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    /**
     * Relasi: Karyawan memiliki satu Jabatan (Position).
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    /**
     * Relasi: Karyawan memiliki banyak data Kehadiran (Attendance).
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    /**
     * Relasi: Karyawan memiliki banyak data Gaji (Salary).
     */
    public function salaries()
    {
        return $this->hasMany(Salary::class, 'karyawan_id');
    }
}
