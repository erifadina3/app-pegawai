<?php

namespace App\Http\Controllers;

use App\Models\Position; 
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::all();
        return view('position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // PERBAIKAN: Menambahkan validasi untuk gaji_pokok
        $validated = $request->validate([
            'nama_jabatan' => 'required|unique:positions,nama_jabatan|max:255',
            'gaji_pokok' => 'nullable|numeric|min:0', 
        ]);

        Position::create($validated); // Gunakan $validated untuk keamanan

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('position.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|unique:positions,nama_jabatan,' . $position->id . '|max:255',
            'gaji_pokok' => 'nullable|numeric|min:0',
        ]);

        $position->update($validated); // Gunakan $validated untuk keamanan

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil dihapus!');
    }
}
