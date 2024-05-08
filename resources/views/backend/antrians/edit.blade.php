@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Antrian</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/antrian/{{ $antrian->id_antrian }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_pasien" class="form-label">Id Pasien</label>
                            <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="{{ $antrian->id_pasien }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_antrian" class="form-label">Nomor Antrian</label>
                            <input type="text" class="form-control" id="nomor_antrian" name="nomor_antrian" value="{{ $antrian->nomor_antrian }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal'" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $antrian->tanggal }}">
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