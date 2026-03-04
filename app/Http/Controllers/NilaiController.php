<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Evaluasi;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NilaiController extends Controller
{
    // ===========================
    // LIST DATA NILAI
    // ===========================
    public function index(Request $request)
    {
        $search = $request->search;

        $siswa = Siswa::with([
    'pertemuans.nilais.mapel',
    'pertemuans.evaluasi'
            ])
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orderBy('nama')
            ->get();

        $mapel = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.index', compact('siswa', 'mapel'));
    }

    // ===========================
    // FORM INPUT NILAI
    // ===========================
    public function create(Request $request)
    {
        $siswa = Siswa::orderBy('nama')->get();
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $selectedSiswa = $request->siswa_id;

        return view('nilai.create', compact('siswa', 'mapel', 'selectedSiswa'));
    }

    // ===========================
    // SIMPAN NILAI + EVALUASI (PER PERTEMUAN)
    // ===========================
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nilai'    => 'required|array',
            'evaluasi' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {

            // ===========================
            // BUAT PERTEMUAN BARU
            // ===========================
            $lastPertemuan = Pertemuan::where('siswa_id', $request->siswa_id)
                ->orderByDesc('pertemuan_ke')
                ->first();

            $pertemuanKe = $lastPertemuan
                ? $lastPertemuan->pertemuan_ke + 1
                : 1;

            $pertemuan = Pertemuan::create([
                'siswa_id'     => $request->siswa_id,
                'pertemuan_ke' => $pertemuanKe,
                'tanggal'      => Carbon::today(),
            ]);

            // ===========================
            // SIMPAN NILAI (TIDAK OVERWRITE)
            // ===========================
            foreach ($request->nilai as $mapel_id => $nilai) {
                if ($nilai !== null && $nilai !== '') {
                    Nilai::create([
                        'siswa_id'     => $request->siswa_id,
                        'mapel_id'     => $mapel_id,
                        'nilai'        => $nilai,
                        'pertemuan_id' => $pertemuan->id,
                    ]);
                }
            }

            // ===========================
            // SIMPAN EVALUASI (WAJIB KE PERTEMUAN)
            // ===========================
            if ($request->filled('evaluasi')) {
                Evaluasi::create([
    'siswa_id'     => $request->siswa_id,
    'pertemuan_id' => $pertemuan->id,
    'tanggal'      => $pertemuan->tanggal, // 🔥 INI KUNCI
    'catatan_guru' => $request->evaluasi,
]);

            }
        });

        return redirect()->route('nilai.index')
            ->with('success', 'Pertemuan berhasil disimpan');
    }

    // ===========================
    // HAPUS SEMUA DATA 1 SISWA
    // ===========================
    public function destroyBySiswa($siswa_id)
    {
        Pertemuan::where('siswa_id', $siswa_id)->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Semua data pertemuan siswa berhasil dihapus');
    }
}
