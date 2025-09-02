<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Temukan peran 'admin'
        $role = Role::findByName('admin');

        // Temukan pengguna dengan ID 1
        $user = User::find(123456);
        if ($user) {
            // Tetapkan peran 'admin' kepada pengguna
            $user->assignRole($role);
        }
    }
}

