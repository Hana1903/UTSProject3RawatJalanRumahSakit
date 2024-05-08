<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pembayarans.index', ['pembayarans' => Pembayaran::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftarans = Pendaftaran::all();
        return view('backend.pembayarans.create', compact('pendaftarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_pendaftaran' => 'required|exists:pendaftarans,id_pendaftaran',
        'tanggal' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'metode_pembayaran' => 'required',
        'total_bayar' => 'required',
        'keterangan' => 'required',
    ]);    

    // Handle file upload
    if ($request->file('gambar')) {
        $validatedData['gambar'] = $request->file('gambar')->store('pembayaran');
    }

    // Create Pembayaran instance with validated data
    Pembayaran::create($validatedData);

    return redirect('/pembayaran')->with('pesan', 'Data saved successfully');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('backend.pembayarans.edit', ['pembayaran' => $pembayaran]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pembayaran)
    {
        $validatedData = $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftarans,id_pendaftaran',
            'tanggal' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'metode_pembayaran' => 'required',
            'total_bayar' => 'required',
            'keterangan' => 'required',
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('pembayaran');
        }
    
        // if ($validator->fails()) {
        //     return redirect('/pembayaran/' . $id . '/edit')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
    
        Pembayaran::where('id_pembayaran',$id_pembayaran)->update($validatedData);
        return redirect('/pembayaran')->with('pesan', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cek = Pembayaran::find($id);
        $cek_gambar = $cek->gambar;
        if($cek_gambar != null || $cek_gambar != ''){
            Storage::delete($cek_gambar);
        }

        Pembayaran::findOrFail($id)->delete();
        return redirect('/pembayaran')->with('pesan', 'Data deleted successfully');
    }
}
