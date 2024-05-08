@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Pembayaran</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/pembayaran/{{ $pembayaran->id_pembayaran }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_pendaftaran" class="form-label">Id Pendaftaran</label>
                            <input type="text" class="form-control" id="id_pendaftaran" name="id_pendaftaran" value="{{ $pembayaran->id_pendaftaran }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $pembayaran->tanggal }}">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" value="{{ $pembayaran->metode_pembayaran }}">
                        </div>                             --}}
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $pembayaran->gambar) }}" style="height: 250px; object-fit: cover; width: 230px;"
                                class="img-preview rounded border border-5 border-white shadow" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Bukti Pembayaran</label>
                            <input type="file" id="gambar" class="form-control @error('gambar')is-invalid @enderror"  name="gambar" accept="image/*" onchange="previewImage()">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total_bayar" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="{{ $pembayaran->total_bayar }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan'" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pembayaran->keterangan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function previewImage() {
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection