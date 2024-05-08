<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Support\Facades\Validator;

class KunjunganController extends Controller
{
    public function index()
    {
        $data = Kunjungan::orderBy('id_kunjungan','asc')->get();
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
        $dataKunjungan = new Kunjungan;

        $rules = [
        'id_pasien' => 'required',
        'id_dokter' => 'required',
        'pemeriksaan' => 'required',
        'tanggal' => 'required|date'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan',
                'data'=>$validator->errors()
            ]);
        }

       $dataKunjungan->id_pasien = $request->id_pasien;
       $dataKunjungan->id_dokter = $request->id_dokter;
       $dataKunjungan->pemeriksaan = $request->pemeriksaan;
       $dataKunjungan->tanggal = $request->tanggal;

        $_POST =$dataKunjungan->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses untuk memasukkan data'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_kunjungan)
    {
        $data = Kunjungan::find($id_kunjungan);
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
        $dataKunjungan = Kunjungan::find($id);
        if (empty($dataKunjungan)) {
            return response()->json([
                'status' => true,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $rules = [
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'pemeriksaan' => 'required',
            'tanggal' => 'required|date'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

           $dataKunjungan->id_pasien = $request->id_pasien;
           $dataKunjungan->id_dokter = $request->id_dokter;
           $dataKunjungan->pemeriksaan = $request->pemeriksaan;
           $dataKunjungan->tanggal = $request->tanggal;

            $_POST =$dataKunjungan->save();
    
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
       $dataKunjungan = Kunjungan::find($id);
        if (empty($dataKunjungan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $_POST =$dataKunjungan->delete();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses melakukan delete data'
            ]);
    }
}