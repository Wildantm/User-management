<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Plant;
use App\Models\Departement;
use App\Models\Jabatan;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); //Admin Dashboard
    }

    public function profile()
    {
        $user = User::with(['plant', 'departement', 'jabatan'])->find(Auth::id());
        return view('admin.profile', compact('user')); //Admin Profile
    }
    
    public function create()
    {
        $roles = Role::all();
        $plants = Plant::all(); // Add this
        $departements = Departement::all(); // probably also needed
        $jabatan = Jabatan::all(); // maybe needed too
        return view('admin.register', compact('roles')); //Admin register user
    }

    public function store(Request $request, User $user)
    {
        $roles = Role::all();

        $validated = $request->validate([
            'npk'       => 'required|unique:users',
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'nohp'      => 'required|string|max:15',
            'password'  => 'required|confirmed',
            'role'      => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'npk'       => $validated['npk'],
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'nohp'      => $validated['nohp'],
            'password'  => bcrypt($validated['password']),
        ]);

        $user->assignRole($validated['role']);
       
        return redirect()->route('admin.register', compact('roles'))->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $roles           = Role::all();
        $plants          = Plant::all();
        $departements   = Departement::all();
        $jabatan        = Jabatan::all();

        return view('admin.users.edit', compact('user', 'roles', 'plants', 'departements', 'jabatan'));
        // Admin users edit
    }

    public function update(Request $request, User $user)
    {
            
             //  dd($request->all());
        if (!Auth::user()->hasRole('admin')){
            //only admin can update user profiles
            abort(403, 'Unauthorized action.');
        }
        

        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'plant_id' => 'required|exists:plants,id',
            'departement_id' => 'required|exists:departements,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'is_active' => 'required|boolean',
            'role'  => 'required|exists:roles,name',
        ]);

            $user->syncRoles([$request->role]);
        

        $user->update($request->except(['npk', 'role']));
        // pastikan NPK tidak ikut diubah

       

        return redirect()->route('admin.users.index')->with('success', 'Profil berhasil diperbarui.');
    
    }
    public function index()
    {
        $users = User::with(['plant', 'departement', 'jabatan', 'role'])->get();
        $plants = Plant::all();
        $departements = Departement::all();
        $jabatan = Jabatan::all();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'plants', 'departements', 'jabatan', 'roles'));
    }   

    public function destroy(Request $request, User $user)
    {
        $admin = $request->user();

        //pastikan yang mengkases adalah admin
        if (!$admin->hasRole('admin')) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus akun ini');
        }

        // admin tidak diizinkan menghapus diri sendiri
        if ($admin->npk === $user->npk){
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus');
    }

    public function toggleActive(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->route('admin.users.index')->with('Success', 'status user berubah');
    }


}
