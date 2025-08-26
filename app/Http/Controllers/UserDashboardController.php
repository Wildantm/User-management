<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plant;
use App\Models\Departement;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return view('users.dashboard');
    }
    public function index()
    {
        return view('users.dashboard'); // users dashboard
    }
    public function profile()
    {
        $user = User::with(['plant', 'departement', 'jabatan'])->find(Auth::id());
        return view('users.profile', compact('user')); //user porfile   
    }
    public function edit()
    {
        $user = Auth::user();

        $plants = Plant::all();
        $departements = Departement::all();
        $jabatans = Jabatan::all();

    return view('users.edit', compact('user', 'plants', 'departements', 'jabatans')); //user edit profile
    }

    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'plant_id' => 'required|exists:plants,id',
            'departement_id' => 'required|exists:departements,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'nohp' => 'nullable|string|max:15',
            'no_bpjs' => 'nullable|string|max:30',
            'no_ktp' => 'nullable|string|max:30',
            'no_npwp' => 'nullable|string|max:30',
        ]);

        
        $user->update($request->except(['npk'])); // pastikan NPK tidak ikut diubah

        return redirect()->route('users.profile')->with('success', 'Profil berhasil diperbarui.');
    
    }

}
