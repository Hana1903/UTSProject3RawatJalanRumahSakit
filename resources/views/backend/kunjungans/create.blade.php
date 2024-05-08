@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Input Kunjungan Terbaru</h5>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/kunjungan" novalidate="novalidate">
                            @csrf
                            @method('post')
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
                                <label for="id_dokter" class="form-label">Id Dokter</label>
                                {{-- <input type="text" class="form-control" id="id_dokter" name="id_dokter" > --}}
                                <select class="form-select" name="id_dokter">
                                    @foreach ($dokters as $item)
                                        @if (old('id_dokter') == $item->nama_dokter)
                                            <option value="{{ $item->id_dokter }}" selected>
                                                {{ $item->nama_dokter }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id_dokter }}">
                                                {{ $item->nama_dokter }}
                                            </option>
                                        @endif
                                        <p>{{ $item->nama_dokter }}</p>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="mb-3">
                                <label for="pemeriksaan" class="form-label">Pemeriksaan</label>
                                <input type="text" class="form-control" id="pemeriksaan" name="pemeriksaan" >
                            </div>                          
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('kunjungan.index') }}" class="btn btn-light">Cancel</a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
