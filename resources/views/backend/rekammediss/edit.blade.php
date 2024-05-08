@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Rekam Medis</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/rekammedis/{{ $rekammedis->id_tindakan }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_pasien" class="form-label">Id Pasien</label>
                            <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $rekammedis->id_pasien }}">
                        </div>
                        <div class="mb-3">
                            <label for="id_dokter" class="form-label">Id Dokter</label>
                            <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="{{ $rekammedis->id_dokter }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="{{ $rekammedis->nama_penyakit }}">
                        </div> 
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $rekammedis->keluhan }}">
                        </div>                          
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $rekammedis->tanggal }}">
                        </div>
                        <div class="mb-3">
                            <label for="tindakan" class="form-label">Tindakan</label>
                            <input type="text" class="form-control" id="tindakan" name="tindakan" value="{{ $rekammedis->tindakan }}">
                        </div> 
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $rekammedis->deskripsi }}">
                        </div> 
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
