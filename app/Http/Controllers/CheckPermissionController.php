<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class CheckPermissionController extends Controller
{
    public function index()
    {   
        $roles = Role::with('permissions')->get();
        $users = User::with(['roles', 'permissions'])->get();
        $permissions = Permission::all();

       

        return view('admin.permissions.index', compact('users', 'permissions', 'roles'));
    }

    public function assignPermission(Request $request)
    {
       
        $request->validate([
            'npk' => 'required|exists:users,npk',
            'permissions' => 'required|array',
            'permissions.*' => 'string|exists:permissions,name',    
        ]);

        $user = User::where('npk', $request->npk)->firstOrFail();

        $user->syncPermissions($request->permissions ?? []);

        return redirect()->route('permissions.index')->with('success');
    }

    public function revokeAll(User $user)
    {
        $user->syncPermissions([]);

        return redirect()->back()->with('success', 'Semua permissions berhasil dihapus.');
    }

    
}
