<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Hapus cache Spatie agar tidak terjadi konflik
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Buat permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view dashboard']);

        // 3. Reset cache lagi setelah membuat permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 4. Buat roles dan assign permission
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo('manage users');

        // Cache bisa dibersihkan lagi jika kamu mau memastikan kondisi segar
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
