@extends('backend.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Data Kunjungan</h5>
          <div class="table-responsive">
            <a href="/kunjungan/create">
                <button type="button" class="btn btn-primary m-1">Add New Kunjungan</button>
            </a>  
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Kunjungan</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Pasien</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Dokter</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Pemeriksaan</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Action</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kunjungans as $kunjungan)
                <tr>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $kunjungan->id_kunjungan }}</h6> 
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $kunjungan->pasien->nama_lengkap }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $kunjungan->dokter->nama_dokter }}</p>
                  </td>
                  <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{ $kunjungan->pemeriksaan }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $kunjungan->tanggal }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $kunjungan->status }}</p>
                  </td>
                  <td class="text-center">
                    <div class="d-flex justify-content-start">
                        <a href="/kunjungan/{{ $kunjungan->id_kunjungan }}/edit" class="btn btn-warning m-1">
                            Update <i class="fas fa-fw fa-wrench"></i>
                        </a>
                        <form action="/kunjungan/{{ $kunjungan->id_kunjungan }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark m-1">Delete <i class="fas fa-fw fa-trash"></i></button>
                        </form>
                    </div>
                </td> 
                </tr>
                @endforeach                       
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
