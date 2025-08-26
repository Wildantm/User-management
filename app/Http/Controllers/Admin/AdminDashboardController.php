<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Plant;
use App\Models\Departement;
use App\Models\Jabatan;


class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Admin dashboard
    }


    public function profile()
    {
        $user = User::with(['plant', 'departement', 'jabatan'])->find(Auth::id());
        return view('admin.profile', compact('user')); // Admin profile
    }


    public function create()
    {
        return view('admin.register'); // Admin register user
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'npk'=>'required|unique:users',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'nohp'=>'required|string|max:15',
            'password'=>'required|confirmed',
            'role'=>'required|in:user,admin',
        ]);
        User::create([
            'npk'=>$validated['npk'],
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'nohp'=>$validated['nohp'],
            'password'=>bcrypt($validated['password']),
            'role'=>$validated['role'],
        ]);
        return redirect()->route('admin.register')->with('success', 'User berhasil ditambahkan!');

    }

    public function edit(User $user)
    {
       if (Auth::user()->role != 'admin' && Auth::user()->npk != $user->npk) {
            // Only admin can edit user profiles
            abort(403, 'Unauthorized action.');
        }

        $plants = Plant::all();
        $departements = Departement::all();
        $jabatan = Jabatan::all();
        return view('admin.users.edit', compact('user', 'plants', 'departements', 'jabatan')); // Admin edit user
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->role != 'admin' && Auth::user()->npk != $user->npk) {
            // Only admin can update user profiles
            abort(403, 'Unauthorized action.');
        }

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

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
    }


    public function index()
    {
        $users = User::with(['plant', 'departement', 'jabatan'])->get();
        return view('admin.users.index', compact('users')); // Admin user management
    }
    public function destroy(Request $request, $npk)
{
    $admin = $request->user();

    // Pastikan yang mengakses adalah admin
    if (!$admin->is_admin) {
        abort(403, 'Anda tidak memiliki izin untuk menghapus akun ini.');
    }

    $user = User::findOrFail($npk);

    // Jangan izinkan admin menghapus dirinya sendiri (opsional)
    if ($admin->npk === $user->npk) {
        return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
    }

    $user->delete();

    return redirect()->back()->with('success', 'Akun berhasil dihapus.');
}

}
