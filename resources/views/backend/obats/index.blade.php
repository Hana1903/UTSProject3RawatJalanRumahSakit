@extends('backend.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Data Obat</h5>
          <div class="table-responsive">
            <a href="/obat/create">
                <button type="button" class="btn btn-primary m-1">Add New Obat</button>
            </a>  
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Obat</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Pasien</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama Obat</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Resep Obat</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Deskripsi</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Harga</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Action</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($obats as $obat)
                <tr>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $obat->id_obat }}</h6> 
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $obat->id_pasien }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $obat->nama_obat }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $obat->resep_obat }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $obat->deskripsi }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $obat->harga }}</p> 
                </td>
                  <td class="text-center">
                    <a href="/obat/{{ $obat->id_obat }}/edit" class="btn btn-warning m-1" style="margin-right: 2px;">
                        Update <i class="fas fa-fw fa-wrench"></i>
                    </a>
                    <form action="/obat/{{ $obat->id_obat }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark m-1">Delete <i class="fas fa-fw fa-trash"></i></button>
                    </form>
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
