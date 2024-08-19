<?php

// app/Http/Controllers/SebaranController.php
namespace App\Http\Controllers;

use App\Models\Sebaran;
use App\Models\SatwaEndemik;
use App\Models\KawasanKonservasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SebaranController extends Controller
{
    public function index()
    {
        $sebaran = Sebaran::with(['satwa', 'kawasan', 'user'])->get();
        $satwa = SatwaEndemik::all();
        $kawasan = KawasanKonservasi::all();
        return view('sebaran', compact('sebaran', 'satwa', 'kawasan'));
    }

    public function create()
    {
        $satwa = SatwaEndemik::all();
        $kawasan = KawasanKonservasi::all();
        return view('sebaranCreate', [
            'satwa' => $satwa,
            'kawasan' => $kawasan,
            'user' => auth()->user() // Mengambil data pengguna yang sedang login
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'satwa_id' => 'required|exists:satwa_endemik,id',
            'kawasan_id' => 'required|exists:kawasan_konservasi,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        Sebaran::create([
            'satwa_id' => $request->satwa_id,
            'kawasan_id' => $request->kawasan_id,
            'user_id' => auth()->id(),
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('sebaran.index')->with('success', 'Sebaran satwa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sebaran = Sebaran::findOrFail($id);
        $satwa = SatwaEndemik::all();
        $kawasan = KawasanKonservasi::all();
        return view('sebaranEdit', compact('sebaran', 'satwa', 'kawasan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'satwa_id' => 'required',
            'kawasan_id' => 'required',
            'user_id' => 'required',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $sebaran = Sebaran::findOrFail($id);
        $sebaran->satwa_id = $request->satwa_id;
        $sebaran->kawasan_id = $request->kawasan_id;
        $sebaran->user_id = $request->user_id;
        $sebaran->tanggal = $request->tanggal;
        $sebaran->jumlah = $request->jumlah;
        $sebaran->keterangan = $request->keterangan;
        $sebaran->latitude = $request->latitude;
        $sebaran->longitude = $request->longitude;
        $sebaran->save();

        return redirect()->route('sebaran.index')->with('success', 'Sebaran berhasil diperbarui');
    }

    public function destroy(Sebaran $sebaran)
    {
        $sebaran->delete();
        return redirect()->route('sebaran.index')->with('success', 'Sebaran satwa berhasil dihapus');
    }

}
