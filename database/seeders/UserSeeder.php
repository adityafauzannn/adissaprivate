<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'akuadit37@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ]
        );

        // Guru 1
        User::updateOrCreate(
            ['email' => 'guru1@mail.com'],
            [
                'name' => 'Guru 1',
                'password' => bcrypt('123456'),
                'role' => 'guru',
            ]
        );

        // Guru 2
        User::updateOrCreate(
            ['email' => 'guru2@mail.com'],
            [
                'name' => 'Guru 2',
                'password' => bcrypt('123456'),
                'role' => 'guru',
            ]
        );

        // Tambahkan guru lain sesuai kebutuhan
    }
}
