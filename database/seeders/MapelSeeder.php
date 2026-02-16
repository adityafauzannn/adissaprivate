<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        $mapels = ['Baca', 'Tulis', 'Hitung', 'Mengaji', 'Matematika'];

        foreach ($mapels as $nama) {
            Mapel::updateOrCreate(['nama_mapel' => $nama]);
        }
    }
}
