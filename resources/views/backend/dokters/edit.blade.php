@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Dokter</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/dokter/{{ $dokter->id_dokter }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="{{ $dokter->nama_dokter }}">
                        </div>
                        <div class="mb-3">
                            <label for="spesialisasi" class="form-label">Spesialisasi</label>
                            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ $dokter->spesialisasi }}">
                        </div>
                        <div class="mb-3">
                            <label for="sub_spesialisasi" class="form-label">Sub Spesialisasi</label>
                            <input type="text" class="form-control" id="sub_spesialisasi" name="sub_spesialisasi" value="{{ $dokter->sub_spesialisasi }}">
                        </div>                            
                        <div class="mb-3">
                            <label for="jadwal_praktek" class="form-label">Jadwal Praktek</label>
                            <input type="text" class="form-control" id="jadwal_praktek" name="jadwal_praktek" value="{{ $dokter->jadwal_praktek }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $dokter->nomor_telepon }}">
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