@extends('backend.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Data Pembayaran</h5>
          <div class="table-responsive">
            <a href="/pembayaran/create">
                <button type="button" class="btn btn-primary m-1">Add New Pembayaran</button>
            </a>  
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Pembayaran</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id Pendaftaran</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal</h6>
                  </th>
                  {{-- <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Metode Pembayaran</h6>
                  </th> --}}
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Total Bayar</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Keterangan</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Gambar</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Action</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pembayarans as $pembayaran)
                <tr>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $pembayaran->id_pembayaran }}</h6> 
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $pembayaran->id_pendaftaran }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $pembayaran->tanggal }}</p>
                  </td>
                  {{-- <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $pembayaran->metode_pembayaran }}</p>
                  </td> --}}
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $pembayaran->total_bayar }}</p>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $pembayaran->keterangan }}</p>
                  </td>
                  <td class="border-bottom-0">
                    @if($pembayaran->gambar)
                    <img src="{{ asset('storage/' . $pembayaran->gambar) }}"
                    style="width: 70px;height:70px;margin:0;object-fit: cover;" alt="">
                    @else
                      <p class="mb-0 fw-normal">Tidak ada gambar</p>
                    @endif
                  </td>
                  <td class="text-center">
                    <div class="d-flex justify-content-start">
                        <a href="/pembayaran/{{ $pembayaran->id_pembayaran }}/edit" class="btn btn-warning m-1">
                            Update <i class="fas fa-fw fa-wrench"></i>
                        </a>
                        <form action="/pembayaran/{{ $pembayaran->id_pembayaran }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark m-1">Delete <i class="fas fa-fw fa-trash"></i></button>
                        </form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pembayaran->id_pembayaran }}">
                          Lihat Gambar
                        </button>
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
  @foreach ($pembayarans as $pembayaran)
<!-- Modal untuk setiap pembayaran -->
<div class="modal fade" id="exampleModal{{ $pembayaran->id_pembayaran }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $pembayaran->id_pembayaran }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{ $pembayaran->id_pembayaran }}">Gambar Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($pembayaran->gambar)
        <img src="{{ asset('storage/' . $pembayaran->gambar) }}" class="img-fluid" alt="Gambar Pembayaran">
        @else
        <p>Tidak ada gambar</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
  </div>
</div>
  </div>
      <script src= 
  "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"> 
      </script>
@endsection