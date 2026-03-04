<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::orderBy('id', 'ASC')->get();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:100'
        ]);

        Mapel::create([
            'nama_mapel' => $request->nama_mapel
        ]);

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:100'
        ]);

        Mapel::findOrFail($id)->update([
            'nama_mapel' => $request->nama_mapel
        ]);

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Mapel::findOrFail($id)->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil dihapus!');
    }
}
