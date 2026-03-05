<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use League\Csv\Reader;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $csv = Reader::createFromPath(database_path('seeders/data/siswas.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {

            Siswa::create([
                'nama' => $record['nama'],
                'kelas' => $record['kelas'],
                'alamat' => $record['alamat'] ?? null,
                'nama_orangtua' => $record['nama_orangtua'] ?? null,
                'kontak_orangtua' => $record['kontak_orangtua'],
                'foto' => $record['foto'] ?? null,
                'token' => Str::uuid()->toString(), // token unik otomatis
            ]);

        }
    }
}