<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat; // tambahkan
use App\Models\Antrian; // tambahkan
use App\Models\Jadwal_Dokter;
use App\Models\Kunjungan; // tambahkan
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Rekam_Medis;

class DashboardController extends Controller
{
    /**
     * Display the dashboard index page.
     */
    public function index()
    {
        $pasienCount = Pasien::count();
        $dokterCount = Dokter::count();
        $pembayaranCount = Pembayaran::count();
        $obatCount = Obat::count();
        $antrianCount = Antrian::count();
        $jadwal_dokterCount = Jadwal_Dokter::count();
        $kunjunganCount = Kunjungan::count();
        $pendaftaranCount = Pendaftaran::count();
        $rekam_medisCount = Rekam_Medis::count();
        
        return view('backend.dashboards.index', [
            'total_pasien' => $pasienCount,
            'total_dokter' => $dokterCount,
            'total_pembayaran' => $pembayaranCount,
            'total_obat' => $obatCount,
            'total_antrian' => $antrianCount,
            'total_jadwal_dokter' => $jadwal_dokterCount,
            'total_kunjungan' => $kunjunganCount,
            'total_pendaftaran' => $pendaftaranCount,
            'total_rekam_medis' => $rekam_medisCount
        ]);
    }
}
