<?php

namespace App\Http\Controllers;

use App\Models\KawasanKonservasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KawasanKonservasiController extends Controller
{
    public function index()
    {
        $kawasan = KawasanKonservasi::all();
        return view('kawasan', compact('kawasan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kawasan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        KawasanKonservasi::create($request->all());

        return redirect()->route('kawasan.index')->with('success', 'Kawasan Konservasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kawasan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kawasan = KawasanKonservasi::findOrFail($id);
        $kawasan->update($request->all());

        return redirect()->route('kawasan.index')->with('success', 'Kawasan Konservasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kawasan = KawasanKonservasi::findOrFail($id);
        $kawasan->delete();

        return redirect()->route('kawasan.index')->with('success', 'Kawasan Konservasi berhasil dihapus.');
    }
}
