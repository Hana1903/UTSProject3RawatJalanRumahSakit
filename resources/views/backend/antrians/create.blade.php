@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Input Antrian Terbaru</h5>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/antrian" novalidate="novalidate">
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
                                <label for="nomor_antrian" class="form-label">Nomor Antrian</label>
                                {{-- <input type="text" class="form-control @error('nomor_antrian')is-invalid @enderror" id="nomor_antrian" name="nomor_antrian" > --}}
                                <select class="form-select" name="nomor_antrian">
                                    @foreach ($pendaftarans as $item)
                                        @if (old('nomor_antrian') == $item->nomor_antrian)
                                            <option value="{{ $item->nomor_antrian}}" selected>
                                                {{ $item->nomor_antrian }}
                                            </option>
                                        @else
                                            <option value="{{ $item->nomor_antrian }}">
                                                {{ $item->nomor_antrian }}
                                            </option>
                                        @endif
                                        <p>{{ $item->nomor_antrian }}</p>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('antrian.index') }}" class="btn btn-light">Cancel</a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
