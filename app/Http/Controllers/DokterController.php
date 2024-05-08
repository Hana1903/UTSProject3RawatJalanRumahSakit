<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dokter;

class DokterController extends Controller
{
    /**
     * Menampilkan daftar dokter.
     */
    public function index()
    {
        return view('backend.dokters.index', ['dokters' => Dokter::paginate(10)]);
    }

    /**
     * Menampilkan formulir untuk membuat dokter baru.
     */
    public function create()
    {
        return view('backend.dokters.create');
    }

    /**
     * Menyimpan dokter baru ke dalam database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_dokter' => 'required|string|max:30',
            'spesialisasi' => 'required|string|max:30',
            'sub_spesialisasi' => 'nullable|string|max:30',
            'jadwal_praktek' => 'required|string|max:30',
            'nomor_telepon' => 'required|string|max:16',
        ]);

        if ($validator->fails()) {
            return redirect('/dokter/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Dokter::create($request->all());
        return redirect('/dokter')->with('pesan', 'Data saved successfully');
    }

    /**
     * Menampilkan formulir untuk mengedit dokter.
     */
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('backend.dokters.edit', ['dokter' => $dokter]);
    }

    /**
     * Memperbarui dokter yang ada dalam database.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_dokter' => 'required|string|max:30',
            'spesialisasi' => 'required|string|max:30',
            'sub_spesialisasi' => 'nullable|string|max:30',
            'jadwal_praktek' => 'required|string|max:30',
            'nomor_telepon' => 'required|string|max:16',
        ]);

        if ($validator->fails()) {
            return redirect('/dokter/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        Dokter::findOrFail($id)->update($request->all());
        return redirect('/dokter')->with('pesan', 'Data updated successfully');
    }

    /**
     * Menghapus dokter dari database.
     */
    public function destroy($id)
    {
        Dokter::findOrFail($id)->delete();
        return redirect('/dokter')->with('pesan', 'Data deleted successfully');
    }
}

