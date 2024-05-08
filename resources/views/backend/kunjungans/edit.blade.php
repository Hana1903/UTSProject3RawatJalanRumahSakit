@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Kunjungan</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/kunjungan/{{ $kunjungan->id_kunjungan }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_pasien" class="form-label">Id Pasien</label>
                            <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $kunjungan->id_pasien }}">
                        </div>
                        <div class="mb-3">
                            <label for="id_dokter" class="form-label">Id Dokter</label>
                            <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="{{ $kunjungan->id_dokter }}">
                        </div> 
                        <div class="mb-3">
                            <label for="pemeriksaan" class="form-label">Pemeriksaan</label>
                            <input type="text" class="form-control" id="pemeriksaan" name="pemeriksaan" value="{{ $kunjungan->pemeriksaan }}">
                        </div>                            
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $kunjungan->tanggal }}">
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
