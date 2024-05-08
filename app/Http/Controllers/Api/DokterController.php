<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dokter::orderBy('id_dokter','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    
    public function store(Request $request)
    {
            $dataDokter = new Dokter;

            $rules = [
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'sub_spesialisasi' => 'required',
            'jadwal_praktek' => 'required',
            'nomor_telepon' => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

            $dataDokter->nama_dokter = $request->nama_dokter;
            $dataDokter->spesialisasi = $request->spesialisasi;
            $dataDokter->sub_spesialisasi = $request->sub_spesialisasi;
            $dataDokter->jadwal_praktek = $request->jadwal_praktek;
            $dataDokter->nomor_telepon = $request->nomor_telepon;
    
            $_POST = $dataDokter->save();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses untuk memasukkan data'
            ],200);
        }

    public function show(string $id_dokter)
    {
        $data = Dokter::find($id_dokter);
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
        $dataDokter = Dokter::find($id);
        if (empty($dataDokter)) {
            return response()->json([
                'status' => true,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $rules = [
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'sub_spesialisasi' => 'required',
            'jadwal_praktek' => 'required',
            'nomor_telepon' => 'required',
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

            $dataDokter->nama_dokter = $request->nama_dokter;
            $dataDokter->spesialisasi = $request->spesialisasi;
            $dataDokter->sub_spesialisasi = $request->sub_spesialisasi;
            $dataDokter->jadwal_praktek = $request->jadwal_praktek;
            $dataDokter->nomor_telepon = $request->nomor_telepon; 

            $_POST = $dataDokter->save();
    
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
        $dataDokter = Dokter::find($id);
        if (empty($dataDokter)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $_POST = $dataDokter->delete();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses melakukan delete data'
            ]);
    }
}