<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus cache Spatie agar perubahan terbaca
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view dashboard']);

        // Buat roles dan link permission
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo('manage users');

        $viewer = Role::create(['name' => 'viewer']);
        $viewer->givePermissionTo('view dashboard');

        // Bersihkan cache lagi agar seeder final
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}

