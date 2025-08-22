<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Jabatan;
class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::with('plant')->get(); // ambil plant sekalian
    return view('departements.index', compact('departements'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plants = Plant::all();
        return view('departements.create', compact('plants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_departement' => 'required',
            'plant_id' => 'required|exists:plants,id'
        ]);

        Departement::create([
            'nama_departement' => $request->nama_departement,
            'plant_id' => $request->plant_id,
        ]);
            return redirect()->route('departements.index')->with('success','Departement berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departement = Departement::findOrFail($id);
        $plant = Plant::all();
        return view('departements.edit', compact('departement', 'plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'nama_departement' => 'required|string|max:255',
            'plant_id' => 'required|exists:plants,id',
        ]);

        $departement->update($validated);

        return redirect()->route('departements.index')->with('succcess', 'Departement berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departement = Departement::findOrFail($id);
    $departement->delete();

    return redirect()->route('departements.index')
                     ->with('success', 'Departement berhasil dihapus');
    }

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class);
    }
}
