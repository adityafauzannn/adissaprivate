<?php

namespace App\Services;

use App\Models\Nilai;
use Carbon\Carbon;

class SAWService
{
    public function hitungSawMingguan($siswaId, $tanggal)
    {
        $start = Carbon::parse($tanggal)->startOfWeek();
        $end = Carbon::parse($tanggal)->endOfWeek();

        $nilaiPerMapel = Nilai::where('siswa_id', $siswaId)
            ->whereBetween('created_at', [$start, $end])
            ->with('mapel')
            ->get()
            ->groupBy('mapel_id');

        if ($nilaiPerMapel->isEmpty()) {
            return null;
        }

        $jumlahMapel = $nilaiPerMapel->count();
        $bobot = 1 / $jumlahMapel;

        $hasilSaw = 0;
        $detail = [];

        foreach ($nilaiPerMapel as $nilaiList) {
            $rataRata = $nilaiList->avg('nilai');

            $hasilSaw += $rataRata * $bobot;

            $detail[] = [
                'mapel' => $nilaiList->first()->mapel->nama_mapel,
                'rata_rata' => round($rataRata, 2),
                'bobot' => round($bobot, 2),
            ];
        }

        return [
            'nilai_akhir' => round($hasilSaw, 2),
            'predikat' => $this->predikat($hasilSaw),
            'detail' => $detail
        ];
    }

    private function predikat($nilai)
    {
        if ($nilai >= 90)
            return 'Sangat Baik';
        if ($nilai >= 80)
            return 'Baik';
        if ($nilai >= 70)
            return 'Cukup';
        return 'Perlu Bimbingan';
    }
}
