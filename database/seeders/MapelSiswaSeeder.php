<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Mapel;

class MapelSiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mapelBTHM = Mapel::whereIn('nama_mapel', ['Baca','Tulis','Hitung','Mengaji'])->pluck('id')->toArray();
        $mapelMatematika = Mapel::where('nama_mapel','Matematika')->pluck('id')->toArray();
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
            if (in_array($siswa->kelas, ['TK','SD1','SD2','SD3'])) {
                $siswa->mapels()->syncWithoutDetaching($mapelBTHM);
            } else {
                $siswa->mapels()->syncWithoutDetaching($mapelMatematika);
            }
        }
    }
}
