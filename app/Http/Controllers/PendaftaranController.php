<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    // Menampilkan semua data pendaftaran
    public function index()
    {
        $pendaftarans = Pendaftaran::paginate(10);
        // dd($pendaftarans);
        return view('backend.pendaftarans.index', compact('pendaftarans'));
    }

    // Menampilkan formulir untuk membuat pendaftaran baru
    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('backend.pendaftarans.create', compact('pasiens','dokters'));
    }

    // Menyimpan data pendaftaran baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'id_antrian' => 'required',
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'nomor_antrian' => 'required|string|max:10',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        // if ($validatedData->fails()) {
        //     dd($validatedData->errors());
        //     return redirect()->route('pendaftaran.create')
        //                 ->withErrors($validatedData)
        //                 ->withInput();
        // }

        Pendaftaran::create($validatedData);
        return redirect()->route('pendaftaran.index')->with('pesan', 'Data berhasil disimpan');
    }

    // Menampilkan detail data pendaftaran
    public function show(Pendaftaran $pendaftaran)
    {
        return view('backend.pendaftarans.show', compact('pendaftaran'));
    }

    // Menampilkan formulir untuk mengedit data pendaftaran
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('backend.pendaftarans.edit', compact('pendaftaran'));
    }

    // Menyimpan perubahan data pendaftaran yang sudah diedit
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $validator = Validator::make($request->all(), [
            // 'id_antrian' => 'required ',
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'nomor_antrian' => 'required|string|max:10',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pendaftaran.edit', $pendaftaran->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $pendaftaran->update([
            // 'id_antrian' => $request->id_antrian,
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'nomor_antrian' => $request->nomor_antrian,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('pendaftaran.index')->with('pesan', 'Data berhasil diperbarui');
    }

    // Menghapus data pendaftaran
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index')->with('pesan', 'Data berhasil dihapus');
    }
}
