<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::with('departement.plant')->get();
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::with('plant')->get();
        return view('jabatan.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'departement_id' => $request->departement_id,
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $departements = Departement::with('plant')->get();
        
        return view('jabatan.edit', compact('jabatan', 'departements'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $jabatan->update($validated);
        
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }
}
