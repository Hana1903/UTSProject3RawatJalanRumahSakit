@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Obat</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/obat/{{ $obat->id_obat }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_pasien" class="form-label">Id Pasien</label>
                            <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $obat->id_pasien }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ $obat->nama_obat }}">
                        </div>                            
                        <div class="mb-3">
                            <label for="resep_obat" class="form-label">Resep Obat</label>
                            <input type="text" class="form-control" id="resep_obat" name="resep_obat" value="{{ $obat->resep_obat }}">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi'" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $obat->deskripsi }}">
                        </div>
                        <div class="mb-3">
                            <label for="harga'" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ $obat->harga }}">
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