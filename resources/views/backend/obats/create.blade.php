@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Input Obat Terbaru</h5>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/obat" novalidate="novalidate">
                            @csrf
                            <div class="mb-3">
                                <label for="id_pasien" class="form-label">Id Pasien</label>
                                {{-- <input type="text" class="form-control" id="id_pasien" name="id_pasien" > --}}
                                <select class="form-select" name="id_pasien">
                                    @foreach ($pasiens as $item)
                                        @if (old('id_pasien') == $item->nama_lengkap)
                                            <option value="{{ $item->id_pasien }}" selected>
                                                {{ $item->nama_lengkap }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id_pasien }}">
                                                {{ $item->nama_lengkap }}
                                            </option>
                                        @endif
                                        <p>{{ $item->nama_lengkap }}</p>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" >
                            </div>                            
                            <div class="mb-3">
                                <label for="resep_obat" class="form-label">Resep Obat</label>
                                <input type="text" class="form-control" id="resep_obat" name="resep_obat" >
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi'" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi'" name="deskripsi" >
                            </div>
                            <div class="mb-3">
                                <label for="harga'" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga'" name="harga" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('obat.index') }}" class="btn btn-light">Cancel</a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
