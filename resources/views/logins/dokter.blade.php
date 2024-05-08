<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5">Selamat Datang Pasien</h1>
            <hr>
            <div class="text-center">
                <img src="{{ asset('assets/images/logos/rs.jpg') }}" alt="Logo Rumah Sakit" width="400">
            </div>
            <div class="text-center mt-4">
                <h5>Selamat datang di pasien Blade</h5>
            </div>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </form>
        </div>
    </div>
</div>
