<?php

namespace App\Http\Controllers;

use App\Models\Department; 
use App\Models\Position;   
use App\Models\Employee; // Sudah ada
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $employees = Employee::orderBy('id', 'asc')->paginate(5);
      // Tambahkan pesan success saat redirect dari store/update/destroy
      return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all(); 
        
        return view('employees.create', compact('departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'nama_lengkap' => 'required|string|max:255',
           'email' => 'required|email|unique:employees,email|max:255', 
           'nomor_telepon' => 'nullable|string|max:20', 
           'tanggal_lahir' => 'nullable|date', 
           'alamat' => 'nullable|string', 
           'tanggal_masuk' => 'required|date',
           'status' => 'required|string|max:50',
           'departemen_id' => 'required|exists:departments,id',
           'jabatan_id' => 'required|exists:positions,id',
        ]);
        
        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee) // PERBAIKAN: Gunakan Route Model Binding
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee) // PERBAIKAN: Gunakan Route Model Binding
    {

        $departments = Department::all();
        $positions = Position::all();

        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee) // PERBAIKAN: Gunakan Route Model Binding
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);
        
        // Gunakan $request->all() jika semua kolom ada di $fillable
        $employee->update($request->all());
        
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee) // PERBAIKAN: Gunakan Route Model Binding
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
