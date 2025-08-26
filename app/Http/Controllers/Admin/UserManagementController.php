<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserManagementController extends Controller
{
//     public function create()
//     {
//         return view('admin.register');
//     }

//     public function store(Request $request)
//     {
//     $validated = $request->validate([
//         'npk' => 'required|unique:users',
//         'name' => 'required',
//         'email' => 'required|email|unique:users',
//         'nohp' => 'required|string|max:15',
//         'password' => 'required|confirmed',
//         'role' => 'required|in:user,admin',
//     ]);


//     User::create([
//         'npk' => $validated['npk'],
//         'name' => $validated['name'],
//         'email' => $validated['email'],
//         'nohp' => $validated['nohp'],
//         'password' => bcrypt($validated['password']),
//         'role' => $validated['role'],
//     ]);

//     return redirect()->route('admin.register')->with('success', 'User created!');
//     }

//     public function index()
//     {
//         $users = User::with(['plant', 'departement', 'jabatan'])->get();
//         return view('admin.users.index', compact('users'));
//     }

// }
}