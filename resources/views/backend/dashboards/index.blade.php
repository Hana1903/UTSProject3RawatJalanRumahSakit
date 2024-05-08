@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard</h1>
                <p>Selamat datang di dashboard Sistem Rawat Jalan Rumah Sakit.</p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pasien</h5>
                        <p class="card-text">Total Pasien = {{$total_pasien}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Dokter</h5>
                        <p class="card-text">Total Dokter = {{$total_dokter}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pembayaran</h5>
                        <p class="card-text">Total Pembayaran = {{$total_pembayaran}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Obat</h5>
                        <p class="card-text">Total Obat = {{$total_obat}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Antrian</h5>
                        <p class="card-text">Total Antrian = {{$total_antrian}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Jadwal Dokter</h5>
                        <p class="card-text">Total Jadwal Dokter = {{$total_jadwal_dokter}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Kunjungan</h5>
                        <p class="card-text">Total Kunjungan = {{$total_kunjungan}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendaftaran</h5>
                        <p class="card-text">Total Pendaftaran = {{$total_pendaftaran}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Rekam Medis</h5>
                        <p class="card-text">Total Rekam Medis = {{$total_rekam_medis}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection