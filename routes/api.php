<?php

use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\Api\DokterController;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\PendaftaranController;
use App\Http\Controllers\Api\Rekam_MedisController;
use App\Http\Controllers\Api\Jadwal_DokterController;
use App\Http\Controllers\Api\AntrianController;
use App\Http\Controllers\Api\KunjunganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('pasien', [PasienController::class, 'index']);
// Route::get('pasien/{id_pasien}', [PasienController::class, 'show']);
// Route::post('pasien', [PasienController::class, 'store']);
// Route::put('pasien/{id_pasien}', [PasienController::class, 'update']);
// Route::put('pasien/{id_pasien}', [PasienController::class, 'delete']);
// Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);

Route::resource('/pasien', PasienController::class);
Route::resource('/dokter', DokterController::class);
Route::resource('/obat', ObatController::class);
Route::resource('/pembayaran', PembayaranController::class);
Route::resource('/pendaftaran', PendaftaranController::class);
Route::resource('/jadwaldokter', Jadwal_DokterController::class);
Route::resource('/rekammedis', Rekam_MedisController::class);
Route::resource('/antrian', AntrianController::class);
Route::resource('/kunjungan', KunjunganController::class);
