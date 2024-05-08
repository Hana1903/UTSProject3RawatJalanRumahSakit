<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Jadwal_Dokter;
use Illuminate\Support\Facades\Validator;

class Jadwal_DokterController extends Controller
{
    public function index()
    {
        $jadwaldokters = Jadwal_Dokter::paginate(10);
        return view('backend.jadwaldokters.index', compact('jadwaldokters') );

    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('backend.jadwaldokters.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_dokter' => 'required|exists:dokters,id_dokter',
            'hari' => 'required|string|max:25',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect('/jadwaldokter/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        Jadwal_Dokter::create($request->all());
        return redirect('/jadwaldokter')->with('pesan', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $jadwalDokter = Jadwal_Dokter::find($id);
        if (!$jadwalDokter) {
            return redirect('/jadwaldokter')->with('pesan', 'Data tidak ditemukan');
        }
        return view('backend.jadwaldokters.edit', ['jadwaldokter' => $jadwalDokter]);
    }

    public function update(Request $request, $id)
    {
        $jadwalDokter = Jadwal_Dokter::find($id);
        if (!$jadwalDokter) {
            return redirect('/jadwaldokter')->with('pesan', 'Data tidak ditemukan');
        }
        $validator = Validator::make($request->all(), [
            'id_dokter' => 'exists:dokters,id_dokter',
            'hari' => 'string|max:25',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect('/jadwaldokter/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $jadwalDokter->update($request->all());
    
        return redirect('/jadwaldokter')->with('pesan', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Jadwal_Dokter::findOrFail($id)->delete();
        return redirect('/jadwaldokter')->with('pesan', 'Data berhasil dihapus');
    }
}
