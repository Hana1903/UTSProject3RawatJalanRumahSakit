@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Input Dokter Terbaru</h5>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/dokter" novalidate="novalidate">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_dokter" class="form-label">Nama Dokter</label>
                                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
                            </div>
                            <div class="mb-3">
                                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi">
                            </div>                           
                            <div class="mb-3">
                                <label for="sub_spesialisasi" class="form-label">Sub Spesialisasi</label>
                                <input type="text" class="form-control" id="sub_spesialisasi" name="sub_spesialisasi">
                            </div>
                            <div class="mb-3">
                                <label for="jadwal_praktek" class="form-label">Jadwal praktek</label>
                                <input type="text" class="form-control" id="jadwal_praktek" name="jadwal_praktek">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
                            </div>
                            <!-- Tambahkan input form lainnya sesuai dengan skema tabel -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dokter.index') }}" class="btn btn-light">Cancel</a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
