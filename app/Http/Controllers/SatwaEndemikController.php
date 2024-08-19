<?php

namespace App\Http\Controllers;

use App\Models\SatwaEndemik;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SatwaEndemikController extends Controller
{
    public function index()
    {
        $satwa = SatwaEndemik::all();
        return view('satwa', compact('satwa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_latin' => 'required|string|max:255',
            'nama_umum' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:4096',
        ]);

        $path = $request->file('gambar') ? $request->file('gambar')->store('gambar_satwa', 'public') : null;

        SatwaEndemik::create([
            'nama_latin' => $request->nama_latin,
            'nama_umum' => $request->nama_umum,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('satwa.index')->with('success', 'Satwa endemik berhasil ditambahkan');
    }

    public function show(SatwaEndemik $satwa)
    {
        return view('satwa.show', compact('satwa'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_latin' => 'required',
            'nama_umum' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $satwa = SatwaEndemik::findOrFail($id);
        $satwa->nama_latin = $request->nama_latin;
        $satwa->nama_umum = $request->nama_umum;
        $satwa->deskripsi = $request->deskripsi;

        // Mengelola gambar jika ada yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($satwa->gambar && file_exists(storage_path('app/public/' . $satwa->gambar))) {
                unlink(storage_path('app/public/' . $satwa->gambar));
            }
            // Upload gambar baru
            $gambarPath = $request->file('gambar')->store('gambar_satwa', 'public');
            $satwa->gambar = $gambarPath;
        }

        $satwa->save();

        return redirect()->back()->with('success', 'Data satwa berhasil diperbarui.');
    }


    public function destroy(SatwaEndemik $satwaEndemik)
    {
        $satwaEndemik->delete();

        return redirect()->route('satwa.index')->with('success', 'Satwa berhasil dihapus.');
    }


}
