<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sebaran;
use App\Models\SatwaEndemik;
use Illuminate\Http\Request;
use App\Models\KawasanKonservasi;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    // Gunakan middleware 'auth' untuk memastikan hanya pengguna yang terotentikasi dapat mengakses metode dalam controller ini
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $jumlahUser = User::where('role', 'user')->count();
        $jumlahAdmin = User::where('role', 'admin')->count();

        // Hitung jumlah artikel
        $jumlahSatwa = SatwaEndemik::count();
        $jumlahKawasan = KawasanKonservasi::count();
        $jumlahSebaran = Sebaran::count();

        return view('admin', [
            'title'             => 'Admin Dashboard',
            'jumlahUser'  => $jumlahUser,
            'jumlahAdmin'     => $jumlahAdmin,
            'jumlahSatwa'     => $jumlahSatwa,
            'jumlahKawasan'     => $jumlahKawasan,
            'jumlahSebaran'     => $jumlahSebaran,
        ]);
    }

    
}
