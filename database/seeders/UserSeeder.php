<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'), // Ganti password sesuai kebutuhan
            ]
        );
        $admin->assignRole('admin');

        // Supervisor
        $supervisor = User::firstOrCreate(
            ['email' => 'supervisor@example.com'],
            [
                'name' => 'Supervisor User',
                'password' => bcrypt('password'),
            ]
        );
        $supervisor->assignRole('supervisor');

        // Regular User
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => bcrypt('password'),
            ]
        );
        $user->assignRole('user');
    }
}
