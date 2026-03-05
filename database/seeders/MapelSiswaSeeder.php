<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Mapel;

class MapelSiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mapelBTHM = Mapel::whereIn('nama_mapel', ['Baca','Tulis','Hitung','Mengaji'])->pluck('id');
        $mapelMatematika = Mapel::where('nama_mapel','Matematika')->pluck('id');

        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {

            if (in_array($siswa->kelas, ['PRA','TK','1','2','3'])) {

                $siswa->mapels()->syncWithoutDetaching($mapelBTHM);

            } else {

                $siswa->mapels()->syncWithoutDetaching($mapelMatematika);

            }
        }
    }
}