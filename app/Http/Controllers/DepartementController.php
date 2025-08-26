<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $departements = Departement::all(); // mengambil semua data departement 

    return view('departements.index', compact('departements'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departements.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    

    $request->validate(['nama_departement' => ['required', 'string', 'max:255'],
    ]);

    Departement::create(['nama_departement' => $request->nama_departement,
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
        return view('departements.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'nama_departement' => 'required|string|max:255',
        ]);

        $departement->update($validated);

        return redirect()->route('departements.index')->with('success', 'Departement berhasil diubah');
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
}
