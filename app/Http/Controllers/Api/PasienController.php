<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $data = Pasien::orderBy('id_pasien','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    
    public function store(Request $request)
    {
            $dataPasien = new Pasien;

            $rules = [
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ibu_kandung' => 'nullable',
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
            'email' => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

            $dataPasien->nama_lengkap = $request->nama_lengkap;
            $dataPasien->jenis_kelamin = $request->jenis_kelamin;
            $dataPasien->tempat_lahir = $request->tempat_lahir;
            $dataPasien->tanggal_lahir = $request->tanggal_lahir;
            $dataPasien->nama_ibu_kandung = $request->nama_ibu_kandung ?? 'Unknown'; // jika tidak tersedia, berikan nilai default
            $dataPasien->agama = $request->agama;
            $dataPasien->status = $request->status;
            $dataPasien->pendidikan = $request->pendidikan;
            $dataPasien->pekerjaan = $request->pekerjaan;
            $dataPasien->nomor_ktp = $request->nomor_ktp;
            $dataPasien->nomor_kk = $request->nomor_kk;
            $dataPasien->nomor_bpjs = $request->nomor_bpjs;
            $dataPasien->nomor_telepon = $request->nomor_telepon;
            $dataPasien->provinsi = $request->provinsi;
            $dataPasien->kabupatenkota = $request->kabupatenkota;
            $dataPasien->alamat = $request->alamat;
            $dataPasien->golongan_darah = $request->golongan_darah;
            $dataPasien->email = $request->email;
    
            $_POST = $dataPasien->save();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses untuk memasukkan data'
            ],200);
        }

    public function show(string $id_pasien)
    {
        $data = Pasien::find($id_pasien);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataPasien = Pasien::find($id);
        if (empty($dataPasien)) {
            return response()->json([
                'status' => true,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $rules = [
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ibu_kandung' => 'nullable',
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
            'email' => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

            $dataPasien->nama_lengkap = $request->nama_lengkap;
            $dataPasien->jenis_kelamin = $request->jenis_kelamin;
            $dataPasien->tempat_lahir = $request->tempat_lahir;
            $dataPasien->tanggal_lahir = $request->tanggal_lahir;
            $dataPasien->nama_ibu_kandung = $request->nama_ibu_kandung ?? 'Unknown'; // jika tidak tersedia, berikan nilai default
            $dataPasien->agama = $request->agama;
            $dataPasien->status = $request->status;
            $dataPasien->pendidikan = $request->pendidikan;
            $dataPasien->pekerjaan = $request->pekerjaan;
            $dataPasien->nomor_ktp = $request->nomor_ktp;
            $dataPasien->nomor_kk = $request->nomor_kk;
            $dataPasien->nomor_bpjs = $request->nomor_bpjs;
            $dataPasien->nomor_telepon = $request->nomor_telepon;
            $dataPasien->provinsi = $request->provinsi;
            $dataPasien->kabupatenkota = $request->kabupatenkota;
            $dataPasien->alamat = $request->alamat;
            $dataPasien->golongan_darah = $request->golongan_darah;
            $dataPasien->email = $request->email;

            $_POST = $dataPasien->save();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses untuk memasukkan data'
            ]);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPasien = Pasien::find($id);
        if (empty($dataPasien)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $_POST = $dataPasien->delete();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses melakukan delete data'
            ]);
    }
}