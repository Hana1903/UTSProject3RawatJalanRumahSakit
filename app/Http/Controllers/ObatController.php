<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    /**
     * Menampilkan daftar obat.
     */
    public function index()
    {
        return view('backend.obats.index', ['obats' => Obat::paginate(10)]);
    }

    /**
     * Menampilkan formulir untuk membuat obat baru.
     */
    public function create()
    {
        $pasiens = Pasien::all();
        return view('backend.obats.create', ['pasiens' => $pasiens]);
    }

    /**
     * Menyimpan obat baru ke dalam database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'nama_obat' => 'required|string|max:30',
            'resep_obat' => 'required|string|max:30',
            'deskripsi' => 'required|string|max:30',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/obat/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Obat::create($request->all());
        return redirect('/obat')->with('flash_message', 'Obat Added!');
    }

    /**
     * Menampilkan detail obat.
     */
    public function show($id)
    {
        $obat = Obat::find($id);
        return view('backend.obats.show', ['obat' => $obat]);
    }

    /**
     * Menampilkan formulir untuk mengedit obat.
     */
    public function edit($id)
    {
        $obat = Obat::find($id);
        $pasiens = Pasien::all();
        return view('backend.obats.edit', ['obat' => $obat, 'pasiens' => $pasiens]);
    }

    /**
     * Memperbarui obat yang ada dalam database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'nama_obat' => 'required|string|max:30',
            'resep_obat' => 'required|string|max:30',
            'deskripsi' => 'required|string|max:30',
            'harga' => 'required|numeric',
        ]);
    
        // Periksa apakah data berhasil divalidasi
        // dd($validatedData);
    
        $obat = Obat::findOrFail($id);
        $obat->update($validatedData);
    
        // Arahkan pengguna kembali ke halaman indeks
        return redirect()->route('obat.index')->with('flash_message', 'Obat Updated!');
    }    

    /**
     * Menghapus obat dari database.
     */
    public function destroy($id)
    {
        Obat::destroy($id);
        return redirect('/obat')->with('flash_message', 'Obat deleted!');
    }
}
