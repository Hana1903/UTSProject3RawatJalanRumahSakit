<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Jadwal_DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Rekam_MedisController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('backend.index');
// });

Route::get('/', function () {
    return view('backend.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    // Route semua user harus login

    Route::middleware('admin')->group(function () {
        // Route yang hanya dapat diakses oleh admin
        Route::resource('pasien', PasienController::class);
        Route::resource('dokter', DokterController::class);
        Route::resource('obat', ObatController::class);
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('dashboard', DashboardController::class);
        Route::resource('rekammedis', Rekam_MedisController::class);
        Route::resource('jadwaldokter', Jadwal_DokterController::class); // Perubahan nama rute di sini
        Route::resource('kunjungan', KunjunganController::class);
        Route::resource('antrian', AntrianController::class);
        Route::resource('pendaftaran', PendaftaranController::class);
        Route::resource('user', UserController::class);
    });

    Route::get('/patient', function () {
        return view('logins.pasien');
    })->name('patient.dashboard')->middleware('patient');

    Route::get('/doctor', function () {
        return view('logins.dokter');
    })->name('doctor.dashboard')->middleware('doctor');
});
