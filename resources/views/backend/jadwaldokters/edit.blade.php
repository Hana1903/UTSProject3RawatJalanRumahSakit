@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Jadwal Dokter</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/jadwaldokter/{{ $jadwaldokter->id_jadwal }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_dokter" class="form-label">Id Dokter</label>
                            <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="{{ $jadwaldokter->id_dokter }}">
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" class="form-control" id="hari" name="hari" value="{{ $jadwaldokter->hari }}">
                        </div>
                        <div class="mb-3">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" step="60" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $jadwaldokter->jam_mulai }}">
                        </div>
                        <div class="mb-3">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" step="60" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $jadwaldokter->jam_selesai }}">
                        </div>   
                        {{-- <div class="mb-3">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" step="60" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $jadwaldokter->jam_mulai }}">
                        </div>
                        <div class="mb-3">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" step="60" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $jadwaldokter->jam_selesai }}">
                        </div>                         --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection