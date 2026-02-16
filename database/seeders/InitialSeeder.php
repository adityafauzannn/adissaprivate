<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== AKUN ADMIN =====
        User::create([
            'name' => 'Admin Adissa',
            'email' => 'admin@adissa.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // ===== AKUN GURU =====
        User::create([
            'name' => 'Guru Adissa',
            'email' => 'guru@adissa.test',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        // ===== DATA MAPEL =====
        Mapel::insert([
            ['nama' => 'Membaca'],
            ['nama' => 'Menulis'],
            ['nama' => 'Menghitung'],
            ['nama' => 'Mengaji'],
        ]);
    }
}
