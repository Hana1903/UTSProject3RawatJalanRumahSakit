<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pasiens.index', ['pasiens' => Pasien::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pasiens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu_kandung' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'nomor_ktp' => 'required',
            'nomor_kk' => 'required',
            'nomor_bpjs' => 'required',
            'nomor_telepon' => 'required',
            'provinsi' => 'required',
            'kabupatenkota' => 'required',
            'alamat' => 'required',
            'golongan_darah' => 'required',
            'email' => 'required|email', // tambahkan validasi email
        ]);

        
        if ($validator->fails()) {
            // dd($validator->fails());
            return redirect('/pasien/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Pasien::create($request->all());
        return redirect('/pasien')->with('pesan', 'Data saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('backend.pasiens.edit', ['pasien' => $pasien]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu_kandung' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'nomor_ktp' => 'required',
            'nomor_kk' => 'required',
            'nomor_bpjs' => 'required',
            'nomor_telepon' => 'required',
            'provinsi' => 'required',
            'kabupatenkota' => 'required',
            'alamat' => 'required',
            'golongan_darah' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            dd($validator->fails());
            return redirect('/pasien/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        Pasien::findOrFail($id)->update($request->all());
        return redirect('/pasien')->with('pesan', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pasien::findOrFail($id)->delete();
        return redirect('/pasien')->with('pesan', 'Data deleted successfully');
    }
}
