<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Define permissions (slug-based)
        $permissions = [
            'admin.dashboard',
            'admin.profile',
            'admin.profile.update',
            'admin.users.index',
            'admin.users.edit',
            'admin.register',
            'admin.register.store',
            'admin.users.destroy',
            'Supervisor.dashboard',
            'section_head.dashboard',
            'users.dashboard',
            'users.edit',
            'users.profile.update',
            'users.profile',
            'admin.permissions.index'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 3. Define roles dan assign permission
        $roles = [
            'admin' => Permission::all()->pluck('name')->toArray(),
            'supervisor' => ['Supervisor.dashboard', 'users.profile'],
            'section_head' => ['section_head.dashboard', 'users.profile'],
            'user' => ['users.dashboard'],
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($perms);
        }

        // 4. Tambahkan user default dan assign role
        $defaultUsers = [
            ['npk' => '0001', 'name' => 'Supervisor User',   'email' => 'supervisor@example.com',  'role' => 'supervisor'],
            ['npk' => '0002', 'name' => 'Section Head User', 'email' => 'section@example.com',     'role' => 'section_head'],
            ['npk' => '0003', 'name' => 'Regular User',      'email' => 'user@example.com',        'role' => 'user'],
        ];

        foreach ($defaultUsers as $u) {
            $user = User::firstOrCreate(
                ['npk' => $u['npk']],
                [
                    'name' => $u['name'],
                    'email' => $u['email'],
                    'password' => Hash::make('password'), // password: password
                ]
            );
            $user->syncRoles([$u['role']]);
        }

        // 5. Bersihkan cache kembali
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
