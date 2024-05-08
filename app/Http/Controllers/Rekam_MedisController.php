<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekam_Medis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Support\Facades\Validator;

class Rekam_MedisController extends Controller
{
    public function index()
    {
        $rekamMedis = Rekam_Medis::paginate(10);
        return view('backend.rekammediss.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('backend.rekammediss.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'nama_penyakit' => 'required|string|max:30',
            'keluhan' => 'required|string|max:35',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string|max:35',
            'deskripsi' => 'required|string|max:40',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect('/rekammedis/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        Rekam_Medis::create($request->all());
        return redirect('/rekammedis')->with('pesan', 'Data saved successfully');
    }

    public function edit($id)
    {
        $rekammedis = Rekam_Medis::find($id);
        if (!$rekammedis) {
            return redirect('/rekammedis')->with('pesan', 'Data tidak ditemukan');
        }
        return view('backend.rekammediss.edit', ['rekammedis' => $rekammedis]);
    }

    public function update(Request $request, $id_tindakan)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'nama_penyakit' => 'required|string|max:30',
            'keluhan' => 'required|string|max:35',
            'tanggal' => 'required|date',
            'tindakan' => 'required|string|max:35',
            'deskripsi' => 'required|string|max:40',
        ]);

        Rekam_Medis::where('id_tindakan',$id_tindakan)->update($validatedData);
        return redirect()->route('rekammedis.index')->with('success', 'Rekam medis berhasil diperbarui');
    }

    public function destroy($id)
    {
        Rekam_Medis::destroy($id);
        return redirect()->route('rekammedis.index')->with('success', 'Rekam medis berhasil dihapus');
    }
}
