<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelasTKSD3 = ['TK','SD1','SD2','SD3'];
        $kelasSD4SMP = ['SD4','SD5','SD6','SMP7','SMP8','SMP9'];

        // Siswa TK–SD3
        foreach ($kelasTKSD3 as $kelas) {
            Siswa::updateOrCreate(
                ['nama' => 'Siswa '.$kelas, 'kelas' => $kelas],
                ['kontak_orangtua' => '0812345678'.rand(10,99)]
            );
        }

        // Siswa SD4–SMP
        foreach ($kelasSD4SMP as $kelas) {
            Siswa::updateOrCreate(
                ['nama' => 'Siswa '.$kelas, 'kelas' => $kelas],
                ['kontak_orangtua' => '0812345678'.rand(10,99)]
            );
        }
    }
}
