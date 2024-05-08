<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Validator;

class AntrianController extends Controller
{
    // Function untuk menampilkan semua data antrian
    public function index()
    {
        $antrians = Antrian::paginate(5);
        return view('backend.antrians.index', compact('antrians') );
    }

    public function create()
    {
        $pendaftarans = Pendaftaran::all(); 
        // $nama_pasien = Pendaftaran::all()->where('id','1');
        // dd($nama_pasien);
        $pasiens = Pasien::all();
        return view('backend.antrians.create', compact('pendaftarans','pasiens'));
    }

    // Function untuk membuat data antrian baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'nomor_antrian' => 'required|exists:pendaftarans,nomor_antrian',
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect('/antrian/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        Antrian::create($request->all());
        return redirect('/antrian')->with('pesan', 'Data saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $antrian = Antrian::find($id);
        if (!$antrian) {
            return redirect('/antrian')->with('pesan', 'Data tidak ditemukan');
        }
        return view('backend.antrians.edit', ['antrian' => $antrian]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $antrian = Antrian::find($id);
        if (!$antrian) {
            return redirect('/antrian')->with('pesan', 'Data tidak ditemukan');
        }
    
        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'nomor_antrian' => 'required|string|max:15|exists:pendaftarans,nomor_antrian',
            'tanggal' => 'required|date',
        ]);
    
        if ($validator->fails()) {
            return redirect('/antrian/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $antrian->update([
            'id_pasien' => $request->id_pasien,
            'nomor_antrian' => $request->nomor_antrian,
            'tanggal' => $request->tanggal,
        ]);
    
        return redirect('/antrian')->with('pesan', 'Data updated successfully');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Antrian::findOrFail($id)->delete();
        return redirect('/antrian')->with('pesan', 'Data deleted successfully');
    }
}
