<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Validator;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Antrian::orderBy('id_antrian','asc')->get();
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
        $dataAntrian = new Antrian;

         $rules = [
         'id_pasien' => 'required',
         'nomor_antrian' => 'required',
         'tanggal' => 'required|date',
         ];

         $validator = Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json([
                 'status'=>false,
                 'message'=>'Data tidak ditemukan',
                 'data'=>$validator->errors()
             ]);
         }

        $dataAntrian->id_pasien = $request->id_pasien;
        $dataAntrian->nomor_antrian = $request->nomor_antrian;
        $dataAntrian->tanggal = $request->tanggal;
 
         $_POST =$dataAntrian->save();
 
         return response()->json([
             'status'=>true,
             'message'=>'Sukses untuk memasukkan data'
         ],200);
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id_antrian)
    {
        $data = Antrian::find($id_antrian);
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
        $dataAntrian = Antrian::find($id);
         if (empty($dataAntrian)) {
             return response()->json([
                 'status' => true,
                 'message' => 'Data tidak ditemukan'
             ], 202);
         }
 
             $rules = [
             'id_pasien' => 'required',
             'nomor_antrian' => 'required',
             'tanggal' => 'required|date',
             ];
 
             $validator = Validator::make($request->all(),$rules);
             if($validator->fails()){
                 return response()->json([
                     'status'=>false,
                     'message'=>'Data tidak ditemukan',
                     'data'=>$validator->errors()
                 ]);
             }
 
            $dataAntrian->id_pasien = $request->id_pasien;
            $dataAntrian->nomor_antrian = $request->nomor_antrian;
            $dataAntrian->tanggal = $request->tanggal;
 
             $_POST =$dataAntrian->save();
     
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
        $dataAntrian = Antrian::find($id);
         if (empty($dataAntrian)) {
             return response()->json([
                 'status' => false,
                 'message' => 'Data tidak ditemukan'
             ], 202);
         }
 
             $_POST =$dataAntrian->delete();
     
             return response()->json([
                 'status'=>true,
                 'message'=>'Sukses melakukan delete data'
             ]);
     }
 }