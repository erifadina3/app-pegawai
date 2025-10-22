<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan nama relasi 'employee'
        $attendances = Attendance::with('employee')->latest()->get();
        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id', // Diperbaiki: karyawan_id
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s', // Diperbaiki: waktu_masuk
            'waktu_keluar' => 'nullable|date_format:H:i:s|after:waktu_masuk', // Diperbaiki: waktu_keluar
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha', // Diperbaiki: status_absensi, enum values
        ]);

        Attendance::create($validated);

        return redirect()->route('attendances.index')->with('success', 'Data kehadiran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $attendance->load('employee');
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s',
            'waktu_keluar' => 'nullable|date_format:H:i:s|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance->update($validated);

        return redirect()->route('attendances.index')->with('success', 'Data kehadiran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Data kehadiran berhasil dihapus.');
    }
}
