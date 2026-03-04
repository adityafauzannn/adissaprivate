<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;

class ParentController extends Controller
{
    /**
     * Halaman awal orang tua (form cari siswa)
     */
    public function index()
    {
        return view('orangtua.index');
    }

    /**
     * Proses pencarian & tampilkan nilai siswa
     */
    public function cari(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Siswa::where('nama', $request->nama)
            ->where('kelas', $request->kelas)
            ->first();

        if (!$siswa) {
            return back()->with('error', 'Data siswa tidak ditemukan');
        }

        $nilai = Nilai::where('siswa_id', $siswa->id)->get();

        return view('orangtua.hasil', compact('siswa', 'nilai'));
    }
}
