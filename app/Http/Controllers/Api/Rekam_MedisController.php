<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekam_Medis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Support\Facades\Validator;

class Rekam_MedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rekam_Medis::orderBy('id_tindakan','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataRekam_Medis = new Rekam_Medis;

         $rules = [
         'id_pasien' => 'required',
         'id_dokter' => 'required',
         'nama_penyakit' => 'required',
         'keluhan' => 'required',
         'tanggal' => 'required',
         'tindakan' => 'required',
         'deskripsi' => 'required'
         ];

         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([
                 'status'=>false,
                 'message'=>'Data tidak ditemukan',
                 'data'=>$validator->errors()
             ]);
         }

        $dataRekam_Medis->id_pasien = $request->id_pasien;
        $dataRekam_Medis->id_dokter = $request->id_dokter;
        $dataRekam_Medis->nama_penyakit = $request->nama_penyakit;
        $dataRekam_Medis->keluhan = $request->keluhan;
        $dataRekam_Medis->tanggal = $request->tanggal;
        $dataRekam_Medis->tindakan = $request->tindakan;
        $dataRekam_Medis->deskripsi = $request->deskripsi;
 
         $_POST =$dataRekam_Medis->save();
 
         return response()->json([
             'status'=>true,
             'message'=>'Sukses untuk memasukkan data'
         ],200);
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id_tindakan)
    {
        $data = Rekam_Medis::find($id_tindakan);
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
        $dataRekam_Medis = Rekam_Medis::find($id);
         if (empty($dataRekam_Medis)) {
             return response()->json([
                 'status' => true,
                 'message' => 'Data tidak ditemukan'
             ], 202);
         }
 
             $rules = [
                'id_pasien' => 'required',
                'id_dokter' => 'required',
                'nama_penyakit' => 'required',
                'keluhan' => 'required',
                'tanggal' => 'required',
                'tindakan' => 'required',
                'deskripsi' => 'required'
             ];
 
             $validator = Validator::make($request->all(),$rules);
             if($validator->fails()){
                 return response()->json([
                     'status'=>false,
                     'message'=>'Data tidak ditemukan',
                     'data'=>$validator->errors()
                 ]);
             }
 
             $dataRekam_Medis->id_pasien = $request->id_pasien;
             $dataRekam_Medis->id_dokter = $request->id_dokter;
             $dataRekam_Medis->nama_penyakit = $request->nama_penyakit;
             $dataRekam_Medis->keluhan = $request->keluhan;
             $dataRekam_Medis->tanggal = $request->tanggal;
             $dataRekam_Medis->tindakan = $request->tindakan;
             $dataRekam_Medis->deskripsi = $request->deskripsi;
 
             $_POST =$dataRekam_Medis->save();
     
             return response()->json([
                 'status'=>true,
                 'message'=>'Sukses untuk memasukkan data'
             ]);
         }
    public function destroy(string $id)
    {
        $dataRekam_Medis = Rekam_Medis::find($id);
         if (empty($dataRekam_Medis)) {
             return response()->json([
                 'status' => false,
                 'message' => 'Data tidak ditemukan'
             ], 202);
         }
 
             $_POST =$dataRekam_Medis->delete();
     
             return response()->json([
                 'status'=>true,
                 'message'=>'Sukses melakukan delete data'
             ]);
     }
 }