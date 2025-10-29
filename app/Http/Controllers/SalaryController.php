<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan nama relasi 'employee'
        $salaries = Salary::with('employee')->orderBy('created_at', 'asc')->get();
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id', // Diperbaiki: karyawan_id
            'bulan' => 'required|string|max:10', // Diperbaiki: 'bulan'
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0', // Diperbaiki: total_gaji
        ]);

        Salary::create($validated);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        $salary->load('employee');
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        $salary->update($validated);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
