@extends('backend.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Data Jadwal Dokter</h5>
          <div class="table-responsive">
            <a href="/jadwaldokter/create">
              <button type="button" class="btn btn-primary m-1">Tambah Jadwal Dokter Baru</button>
          </a>  
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Jadwal</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Dokter</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Hari</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Jam Mulai</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Jam Selesai</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Action</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwaldokters as $jadwaldokter)
                <tr>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $jadwaldokter->id_jadwal }}</h6> 
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $jadwaldokter->dokter->nama_dokter }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $jadwaldokter->hari }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal"> {{ date('h:i', strtotime($jadwaldokter['jam_mulai'])) }}</p>
                </td>                
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"> {{ date('h:i', strtotime($jadwaldokter['jam_selesai'])) }}</p>
              </td> 
                  <td class="text-center">
                    <div class="d-flex justify-content-start">
                        <a href="/jadwaldokter/{{ $jadwaldokter->id_jadwal }}/edit" class="btn btn-warning m-1">
                            Update <i class="fas fa-fw fa-wrench"></i>
                        </a>
                        <form action="/jadwaldokter/{{ $jadwaldokter->id_jadwal }}" method="POST" style="display: inline;">
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
