<?php

namespace App\Http\Controllers;

use App\Models\Sebaran;
use App\Models\SatwaEndemik;
use Illuminate\Http\Request;
use App\Models\KawasanKonservasi;
use Illuminate\Routing\Controller;

class HomeController
{
    public function index()
    {
        $sebaranData = Sebaran::with('satwa')->get()->map(function ($sebaran) {
            return [
                'latitude' => $sebaran->latitude,
                'longitude' => $sebaran->longitude,
                'nama_latih' => $sebaran->satwa->nama_latin,
                'nama_umum' => $sebaran->satwa->nama_umum,
                'gambar' => $sebaran->satwa->gambar ? asset('storage/' . $sebaran->satwa->gambar) : null,
                'keterangan' => $sebaran->keterangan,
            ];
        });

        return view('home', [
            'sebaranData' => $sebaranData
        ]);
    }

}
