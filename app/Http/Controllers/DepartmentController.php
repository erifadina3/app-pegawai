<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi hanya 'nama_departemen' sesuai migrasi
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $department->id,
        ]); 
        
        $department->update($validated);
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diperbarui!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
