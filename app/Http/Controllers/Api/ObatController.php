<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Obat::orderBy('id_obat','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    
    public function store(Request $request)
    {
            $dataObat = new Obat;

            $rules = [
            'id_pasien' => 'required',
            'nama_obat' => 'required',
            'resep_obat' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

            $dataObat->id_pasien = $request->id_pasien;
            $dataObat->nama_obat = $request->nama_obat;
            $dataObat->resep_obat = $request->resep_obat;
            $dataObat->deskripsi = $request->deskripsi;
            $dataObat->harga = $request->harga;
    
            $_POST = $dataObat->save();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses untuk memasukkan data'
            ],200);
        }

    public function show(string $id_dokter)
    {
        $data = Obat::find($id_dokter);
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
        $dataObat = Obat::find($id);
        if (empty($dataObat)) {
            return response()->json([
                'status' => true,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $rules = [
            'id_pasien' => 'required',
            'nama_obat' => 'required',
            'resep_obat' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan',
                    'data'=>$validator->errors()
                ]);
            }

            $dataObat->id_pasien = $request->id_pasien;
            $dataObat->nama_obat = $request->nama_obat;
            $dataObat->resep_obat = $request->resep_obat;
            $dataObat->deskripsi = $request->deskripsi;
            $dataObat->harga = $request->harga; 

            $_POST = $dataObat->save();
    
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
        $dataObat = Obat::find($id);
        if (empty($dataObat)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 202);
        }

            $_POST = $dataObat->delete();
    
            return response()->json([
                'status'=>true,
                'message'=>'Sukses melakukan delete data'
            ]);
    }
}