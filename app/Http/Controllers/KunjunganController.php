<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Support\Facades\Validator;

class KunjunganController extends Controller
{
    // Menampilkan semua data kunjungan
    public function index()
    {
        $kunjungans = Kunjungan::paginate(10);
        return view('backend.kunjungans.index',  compact('kunjungans'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('backend.kunjungans.create', compact('pasiens','dokters'));
    }

    // Menyimpan data kunjungan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'pemeriksaan' => 'required|string|max:30',
            'tanggal' => 'required|date',
        ]);

        Kunjungan::create($validatedData);
        return redirect()->route('kunjungan.index')->with('pesan', 'Data berhasil disimpan');
    }


    // Menampilkan data kunjungan berdasarkan ID
    public function show(Kunjungan $kunjungan)
    {
        return view('backend.kunjungans.show', compact('kunjungan'));
    }

    public function edit(Kunjungan $kunjungan)
    {
        return view('backend.kunjungans.edit', compact('kunjungan'));
    }

    // Mengupdate data kunjungan
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'pemeriksaan' => 'required|string|max:30',
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('kunjungan.edit', $kunjungan->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $kunjungan->update([
            // 'id_antrian' => $request->id_antrian,
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'pemeriksaan' =>$request->pemeriksaan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('kunjungan.index')->with('pesan', 'Data berhasil diperbarui');
    }

    // Menghapus data kunjungan
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect()->route('kunjungan.index')->with('pesan', 'Data berhasil dihapus');
    }
}

