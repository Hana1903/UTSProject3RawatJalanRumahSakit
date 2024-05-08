@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5">Selamat Datang di Sistem Rawat Jalan Rumah Sakit</h1>
            <hr>
            <div class="text-center">
                <img src="{{ asset('assets/images/logos/rs.jpg') }}" alt="Logo Rumah Sakit" width="400">
            </div>
            <div class="text-center mt-4">
                <h5>Selamat datang di dashboard sistem rawat jalan rumah sakit kami! Di sini, Anda akan menemukan berbagai</h5>
                <h5>informasi penting terkait pasien, dokter, obat, dan berbagai aspek lain dari layanan kesehatan yang </h5>
                <h5>kami sediakan. Dashboard ini dirancang untuk memberikan akses cepat dan mudah ke data pasien, jadwal </h5>
                <h5>dokter, serta inventaris obat-obatan. Anda dapat menggunakan menu navigasi untuk menjelajahi berbagai</h5>
                <h5>fitur yang kami tawarkan.</h5>
                <h5>Apakah Anda ingin mencari informasi tentang pasien tertentu, mengelola jadwal dokter, atau melihat </h5>
                <h5>stok obat-obatan yang tersedia, semuanya dapat diakses dari sini. Kami berharap dashboard ini dapat </h5>
                <h5>memberikan pengalaman pengguna yang menyenangkan dan efisien bagi semua pengguna. Terima kasih telah </h5>
                <h5>menggunakan sistem rawat jalan rumah sakit kami. Jika Anda memiliki pertanyaan atau memerlukan bantuan, </h5>
                <h5>jangan ragu untuk menghubungi kami. Kami siap membantu Anda dengan segala kebutuhan yang Anda miliki.</h5>
            </div>
        </div>
    </div>
</div>
@endsection
