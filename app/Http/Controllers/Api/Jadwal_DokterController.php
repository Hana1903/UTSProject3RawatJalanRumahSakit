<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Jadwal_Dokter;
use Illuminate\Support\Facades\Validator;

class Jadwal_DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jadwal_Dokter::orderBy('id_jadwal','asc')->get();
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
           $dataJadwal_Dokter = new Jadwal_Dokter;

            $rules = [
            'id_dokter' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

           $dataJadwal_Dokter->id_dokter = $request->id_dokter;
           $dataJadwal_Dokter->hari = $request->hari;
           $dataJadwal_Dokter->jam_mulai = $request->jam_mulai;
           $dataJadwal_Dokter->jam_selesai = $request->jam_selesai;
    
            $_POST =$dataJadwal_Dokter->save();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses untuk memasukkan data'
            ],200);
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id_jadwal)
    {
        $data = Jadwal_Dokter::find($id_jadwal);
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
        $dataJadwal_Dokter = Jadwal_Dokter::find($id);
         if (empty($dataJadwal_Dokter)) {
             return response()->json([
                 'status' => true,
                 'message' => 'Data tidak ditemukan'
             ], 202);
         }
 
             $rules = [
             'id_dokter' => 'required',
             'hari' => 'required',
             'jam_mulai' => 'required',
             'jam_selesai' => 'required',
             ];
 
             $validator = Validator::make($request->all(),$rules);
             if($validator->fails()){
                 return response()->json([
                     'status'=>false,
                     'message'=>'Data tidak ditemukan',
                     'data'=>$validator->errors()
                 ]);
             }
 
            $dataJadwal_Dokter->id_dokter = $request->id_dokter;
            $dataJadwal_Dokter->hari = $request->hari;
            $dataJadwal_Dokter->jam_mulai = $request->jam_mulai;
            $dataJadwal_Dokter->jam_selesai = $request->jam_selesai; 
 
             $_POST =$dataJadwal_Dokter->save();
     
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
        $dataJadwal_Dokter = Jadwal_Dokter::find($id);
         if (empty($dataJadwal_Dokter)) {
             return response()->json([
                 'status' => false,
                 'message' => 'Data tidak ditemukan'
             ], 202);
         }
 
             $_POST =$dataJadwal_Dokter->delete();
     
             return response()->json([
                 'status'=>true,
                 'message'=>'Sukses melakukan delete data'
             ]);
     }
 }
