@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data User</h5>
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="/user/{{ $user->id_user }}" novalidate="novalidate">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Id User</label>
                            <input type="text" class="form-control" id="id_user" name="id_user" value="{{ $user->id_user }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>                            
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_registrasi'" class="form-label">Tanggal Registrasi</label>
                            <input type="text" class="form-control" id="tanggal_registrasi" name="tanggal_registrasi" value="{{ $user->tanggal_registrasi }}">
                        </div>
                        <div class="mb-3">
                            <label for="harga'" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ $user->harga }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection