@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Input Pembayaran Terbaru</h5>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/pembayaran" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id_pendaftaran" class="form-label">Id Pendaftaran</label>
                                {{-- <input type="text" class="form-control" id="id_pendaftaran" name="id_pendaftaran" > --}}
                                <select class="form-select" name="id_pendaftaran">
                                    @foreach ($pendaftarans as $item)
                                        @if (old('id_pasien') == $item->id_pendaftaran)
                                            <option value="{{ $item->id_pendaftaran}}" selected>
                                                {{ $item->id_pendaftaran }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id_pendaftaran}}">
                                                {{ $item->id_pendaftaran }}
                                            </option>
                                        @endif
                                        <p>{{ $item->id_pendaftaran }}</p>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" >
                            </div>
                            {{-- <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" >
                            </div> --}}
                            <div class="mb-3">
                                <img src="/assets/images/logos/profil.png" style="height: 250px; object-fit: cover; width: 230px;"
                                    class="img-preview rounded border border-5 border-white shadow" alt="">
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Bukti Pembayaran</label>
                                <input type="file" id="gambar" class="form-control" name="gambar" accept="image/*" onchange="previewImage()">
                            </div>
                            <div class="mb-3">
                                <label for="total_bayar" class="form-label">Total Bayar</label>
                                <input type="text" class="form-control" id="total_bayar" name="total_bayar" >
                            </div>
                            <div class="mb-3">
                                <label for="keterangan'" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan'" name="keterangan" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-light">Cancel</a>
                        </form>                        
                    </div>
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
