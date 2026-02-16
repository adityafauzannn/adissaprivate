<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // ✅ TAMBAHAN (WAJIB UNTUK TOKEN)

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $siswas = Siswa::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', "%$keyword%")
                      ->orWhere('kelas', 'like', "%$keyword%")
                      ->orWhere('nama_orangtua', 'like', "%$keyword%");
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('siswa.index', compact('siswas', 'keyword'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'alamat' => 'nullable|string',
            'nama_orangtua' => 'nullable|string|max:255',
            'kontak_orangtua' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // SIMPAN FOTO
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        // 🔑 TAMBAHAN: TOKEN LINK ORANG TUA
        $data['token'] = Str::random(40);

        Siswa::create($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'alamat' => 'nullable|string',
            'nama_orangtua' => 'nullable|string|max:255',
            'kontak_orangtua' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // JIKA GANTI FOTO
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }

            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        // 🔑 TAMBAHAN: JIKA SISWA LAMA BELUM PUNYA TOKEN
        if (!$siswa->token) {
            $data['token'] = Str::random(40);
        }

        $siswa->update($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        // hapus foto
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
