<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plant = Plant::all();
        return view('plant.index', compact('plant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role !== 'admin'){
            abort(403);
        }
        return view('plant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_plant' => ['required', 'string', 'max:255', 'unique:plants,nama_plant'],
            'lokasi' => ['required', 'string', 'max:255'],
        ], ['nama_plant.unique' => 'Nama plant sudah ada.',
        ]);

        $plant = Plant::create($request->all());
        return redirect()->route('plant.index')->with('success', 'Plant berhasil ditambahkan');
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
    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plant.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_plant' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $plant = Plant::findOrFail($id);
        $plant->update([
            'nama_plant' => $request->nama_plant,
            'lokasi' => $request->lokasi,
        ]);
        return redirect()->route('plant.index')->with('success', 'Plant berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();
        return redirect()->route('plant.index')->with('success', 'Plant berhasil dihapus');
    }
}
