<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // =====================
        // SUMMARY
        // =====================
        $totalSiswa = Siswa::count();
        $totalMapel = Mapel::count();
        $totalNilai = Nilai::count();

        // =====================
        // GRAFIK RATA-RATA NILAI PER MAPEL
        // =====================
        $rataMapel = DB::table('mapels')
            ->leftJoin('nilais', 'mapels.id', '=', 'nilais.mapel_id')
            ->select(
                'mapels.nama_mapel',
                DB::raw('AVG(nilais.nilai) as rata_rata')
            )
            ->groupBy('mapels.nama_mapel')
            ->get();

        // =====================
        // GRAFIK PERKEMBANGAN NILAI (1 SISWA)
        // =====================
        $siswa = Siswa::with(['nilai.mapel'])->get();

        return view('dashboard.index', compact(
            'totalSiswa',
            'totalMapel',
            'totalNilai',
            'rataMapel',
            'siswa'
        ));
    }
}
