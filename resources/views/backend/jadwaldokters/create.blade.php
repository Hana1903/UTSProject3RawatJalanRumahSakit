@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Input Jadwal Dokter Baru</h5>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/jadwaldokter" novalidate="novalidate">
                            @csrf                           
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
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" id="hari" name="hari" >
                            </div>
                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" step="60" class="form-control" id="jam_mulai" name="jam_mulai" >
                            </div>
                            <div class="mb-3">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" step="60" class="form-control" id="jam_selesai" name="jam_selesai" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('jadwaldokter.index') }}" class="btn btn-light">Cancel</a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
