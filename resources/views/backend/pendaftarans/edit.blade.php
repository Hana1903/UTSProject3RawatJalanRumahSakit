@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Pendaftaran</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/pendaftaran/{{ $pendaftaran->id_pendaftaran }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="id_antrian" class="form-label">Id Antrian</label>
                            <input type="text" class="form-control" id="id_antrian" name="id_antrian" value="{{ $pendaftaran->id_antrian }}">
                        </div> --}}
                        <div class="mb-3">
                            <label for="id_pasien" class="form-label">Id Pasien</label>
                            <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $pendaftaran->id_pasien }}">
                        </div>
                        <div class="mb-3">
                            <label for="id_dokter" class="form-label">Id Dokter</label>
                            <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="{{ $pendaftaran->id_dokter }}">
                        </div>                            
                        <div class="mb-3">
                            <label for="nomor_antrian" class="form-label">Nomor Antrian</label>
                            <input type="text" class="form-control" id="nomor_antrian" name="nomor_antrian" value="{{ $pendaftaran->nomor_antrian }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pendaftaran->tanggal }}">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" value="{{ $pendaftaran->status  }}">
                                <option value="Kunjungan">Kunjungan</option>
                                <option value="Rekam Medis">Rekam Medis</option>
                            </select>
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
