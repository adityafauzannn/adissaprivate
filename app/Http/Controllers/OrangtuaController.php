<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Services\SAWService;

class OrangtuaController extends Controller
{
    public function index()
    {
        // Halaman awal, belum ada pencarian
        return view('orangtua.index', [
            'siswa' => null
        ]);
    }

    public function cari(Request $request, SAWService $saw)
    {
        $request->validate([
            'nama'  => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Siswa::with([
            'pertemuans.nilais.mapel',
            'pertemuans.evaluasi'
        ])
        ->where('nama', $request->nama)
        ->where('kelas', $request->kelas)
        ->first();

        if (!$siswa) {
            return view('orangtua.index', [
                'siswa' => null
            ]);
        }

        // 🔥 HITUNG SAW (MINGGU INI)
        $hasilSaw = $saw->hitungSawMingguan($siswa->id, now());

        return view('orangtua.index', compact('siswa', 'hasilSaw'));
    }
}
