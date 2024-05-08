<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pendaftaran::orderBy('id_pendaftaran','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    
    public function store(Request $request)
    {
           $dataPendaftaran = new Pendaftaran;

            $rules = [
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'nomor_antrian' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

           $dataPendaftaran->id_pasien = $request->id_pasien;
           $dataPendaftaran->id_dokter = $request->id_dokter;
           $dataPendaftaran->nomor_antrian = $request->nomor_antrian;
           $dataPendaftaran->tanggal = $request->tanggal;
           $dataPendaftaran->status = $request->status;
    
            $_POST =$dataPendaftaran->save();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses untuk memasukkan data'
            ],200);
        }

    public function show(string $id_dokter)
    {
        $data = Pendaftaran::find($id_dokter);
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
       $dataPendaftaran = Pendaftaran::find($id);
        if (empty($dataPendaftaran)) {
            return response()->json([
                'status' => true,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $rules = [
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'nomor_antrian' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

           $dataPendaftaran->id_pasien = $request->id_pasien;
           $dataPendaftaran->id_dokter = $request->id_dokter;
           $dataPendaftaran->nomor_antrian = $request->nomor_antrian;
           $dataPendaftaran->tanggal = $request->tanggal;
           $dataPendaftaran->status = $request->status; 

            $_POST =$dataPendaftaran->save();
    
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
       $dataPendaftaran = Pendaftaran::find($id);
        if (empty($dataPendaftaran)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $_POST =$dataPendaftaran->delete();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses melakukan delete data'
            ]);
    }
}