@extends('backend.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Data Antrian</h5>
          <div class="table-responsive">
            <a href="/antrian/create">
                <button type="button" class="btn btn-primary m-1">Tambah Antrian Baru</button>
            </a>  
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Antrian</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Pasien</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nomor Antrian</h6>
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
                @foreach ($antrians as $antrian)
                <tr>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $antrian->id_antrian }}</h6> 
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $antrian->pasien->nama_lengkap }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $antrian->nomor_antrian }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $antrian->tanggal }}</p>
                  </td>
                  <td class="text-center">
                    <div class="d-flex justify-content-start">
                        <a href="/antrian/{{ $antrian->id_antrian }}/edit" class="btn btn-warning m-1">
                            Update <i class="fas fa-fw fa-wrench"></i>
                        </a>
                        <form action="/antrian/{{ $antrian->id_antrian }}" method="POST" style="display: inline;">
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
