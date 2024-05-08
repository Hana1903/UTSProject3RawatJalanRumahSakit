-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2024 pada 08.50
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemrawatjalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrians`
--

CREATE TABLE `antrians` (
  `id_antrian` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `nomor_antrian` char(15) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `antrians`
--

INSERT INTO `antrians` (`id_antrian`, `id_pasien`, `nomor_antrian`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, '01', '2024-03-01', '2024-05-05 19:16:16', '2024-05-05 19:16:16'),
(3, 2, '02', '2024-03-01', '2024-05-07 18:55:13', '2024-05-07 18:55:13'),
(4, 3, '04', '2024-03-05', '2024-05-07 18:55:29', '2024-05-07 18:55:29'),
(5, 4, '02', '2024-03-07', '2024-05-07 18:55:52', '2024-05-07 18:55:52'),
(6, 1, '04', '2024-03-12', '2024-05-07 18:56:06', '2024-05-07 18:56:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokters`
--

CREATE TABLE `dokters` (
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialisasi` varchar(30) NOT NULL,
  `sub_spesialisasi` varchar(30) DEFAULT NULL,
  `jadwal_praktek` varchar(30) NOT NULL,
  `nomor_telepon` char(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokters`
--

INSERT INTO `dokters` (`id_dokter`, `nama_dokter`, `spesialisasi`, `sub_spesialisasi`, `jadwal_praktek`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(1, 'Alexander', 'THT', 'Telinga', 'Rabu, Kamis, Jumat', '098765436789', '2024-05-05 19:13:07', '2024-05-05 19:14:25'),
(2, 'Alexndra Bell Eisten', 'Organ Dalam', 'Jantung', 'Senin, Selasa, Rabu', '081245456890', '2024-05-05 19:13:30', '2024-05-05 19:13:30'),
(3, 'Elandra', 'THT', 'Hidung', 'Rabu, Kamis, Jumat', '098765436564', '2024-05-05 19:13:52', '2024-05-05 19:13:52'),
(4, 'Renaldo', 'Organ Dalam', 'Hati', 'Senin, Selasa, Kamis', '081123567890', '2024-05-05 19:14:11', '2024-05-05 19:14:11'),
(6, 'Xander', 'Saraf', 'Saraf Mata', 'Kamis, Jumat', '093412347898', '2024-05-07 18:50:20', '2024-05-07 18:50:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jdwl_dokters`
--

CREATE TABLE `jdwl_dokters` (
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `hari` varchar(25) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jdwl_dokters`
--

INSERT INTO `jdwl_dokters` (`id_jadwal`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin, Selasa, Rabu', '07:25:00', '18:25:00', '2024-05-07 09:56:07', '2024-05-07 09:56:07'),
(3, 2, 'Kamis, Jumat', '07:00:00', '16:00:00', '2024-05-07 18:56:35', '2024-05-07 18:56:35'),
(4, 3, 'Senin, Rabu, Jumat', '07:00:00', '14:00:00', '2024-05-07 18:57:01', '2024-05-07 18:57:01'),
(5, 4, 'Rabu, Kamis, Jumat', '08:00:00', '19:00:00', '2024-05-07 18:57:25', '2024-05-07 18:57:25'),
(6, 6, 'Jumat', '08:00:00', '19:45:00', '2024-05-07 18:57:48', '2024-05-07 18:57:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungans`
--

CREATE TABLE `kunjungans` (
  `id_kunjungan` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `pemeriksaan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kunjungans`
--

INSERT INTO `kunjungans` (`id_kunjungan`, `id_pasien`, `id_dokter`, `pemeriksaan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kunjungan THT', '2024-03-12', '2024-05-07 11:16:22', '2024-05-07 11:16:22'),
(3, 2, 2, 'Periksa Kesehatan', '2024-02-03', '2024-05-07 23:23:38', '2024-05-07 23:23:38'),
(4, 4, 2, 'Kunjungan THT', '2020-01-01', '2024-05-07 23:24:06', '2024-05-07 23:24:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_05_061517_create_pasiens_table', 1),
(6, '2024_03_06_010457_create_dokters_table', 1),
(7, '2024_03_06_010508_create_kunjungans_table', 1),
(8, '2024_03_06_010517_create_antrians_table', 1),
(9, '2024_03_06_010518_create_pendaftarans_table', 1),
(10, '2024_03_06_010537_create_pembayarans_table', 1),
(11, '2024_03_06_010620_create_jdwl_dokters_table', 1),
(12, '2024_03_06_010737_create_rekam_mediss_table', 1),
(13, '2024_03_06_011042_create_obats_table', 1),
(14, '2024_04_03_141604_drop_column_from_pembayarans_table', 1),
(15, '2024_04_03_141604_drop_column_from_pendaftarans_table', 1),
(16, '2024_04_15_180328_add_field_to_pembayarans', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obats`
--

CREATE TABLE `obats` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `resep_obat` varchar(30) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obats`
--

INSERT INTO `obats` (`id_obat`, `id_pasien`, `nama_obat`, `resep_obat`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paracetamol', 'Benzoquinon', 'Minum 3 x Sehari', '20000.00', '2024-05-07 09:06:19', '2024-05-07 09:06:19'),
(3, 2, 'Obat Tetes', 'ciprofloxacin', 'Teteskan 1xSehari', '25000.00', '2024-05-07 18:52:39', '2024-05-07 18:52:39'),
(4, 3, 'Vitamin C', 'Extrak Orange', 'Minum 3 x Sehari', '12000.00', '2024-05-07 18:53:06', '2024-05-07 18:53:06'),
(5, 4, 'Paracetamol', 'Benzoquinon', 'Demam 3xSehari', '14000.00', '2024-05-07 18:53:36', '2024-05-07 18:53:36'),
(6, 5, 'Vitamin C', 'ciprofloxacin', 'Minum 3 x Sehari', '12000.00', '2024-05-07 18:53:55', '2024-05-07 18:53:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasiens`
--

CREATE TABLE `pasiens` (
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ibu_kandung` varchar(30) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pendidikan` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `nomor_ktp` char(20) NOT NULL,
  `nomor_kk` char(20) NOT NULL,
  `nomor_bpjs` char(20) NOT NULL,
  `nomor_telepon` char(20) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kabupatenkota` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `golongan_darah` char(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasiens`
--

INSERT INTO `pasiens` (`id_pasien`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nama_ibu_kandung`, `agama`, `status`, `pendidikan`, `pekerjaan`, `nomor_ktp`, `nomor_kk`, `nomor_bpjs`, `nomor_telepon`, `provinsi`, `kabupatenkota`, `alamat`, `golongan_darah`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Hana Aliyah', 'P', 'Payakumbuh', '2003-03-19', 'Andriani', 'Islam', 'BPJS', 'Diploma', 'Mahasiswa', '100323456789', '10091234567890', '445566', '083124354567', 'Sumatera Barat', 'Kota Payakumbuh', 'Jalan Balai Gadang Congkong No 134', 'O', 'hana@gmail.com', '2024-05-05 18:27:13', '2024-05-05 18:27:13'),
(2, 'Wahyu Saputra', 'L', 'Padang', '2002-12-12', 'Maharani', 'Islam', 'Umum', 'Diploma', 'Mahasiswa', '100322334455', '10091122334455', '112233', '081245456776', 'Sumatera Barat', 'Kota Padang', 'Jalan Urak Karang No 11', 'B', 'wahyu@gmail.com', '2024-05-05 18:29:37', '2024-05-05 18:29:37'),
(3, 'Fazila Surya Azzahrah', 'P', 'Bukittinggi', '2003-07-07', 'Herlina', 'Islam', 'BPJS', 'Sarjana', 'PNS', '100300998877', '10093456789032', '567890', '083356437890', 'Sumatera Barat', 'Kota Bukittingi', 'Jalan Simpang Kantin Raya Nomor 546', 'AB', 'fazila@gmail.com', '2024-05-05 19:07:20', '2024-05-05 19:07:20'),
(4, 'Muhammad Raihan Putera', 'L', 'Payakumbuh', '2002-01-20', 'Andriani', 'Islam', 'BPJS', 'SD', 'Mahasiswa', '100323567890', '10095656787890', '456789', '097856545643', 'Sumatera Barat', 'Kota Payakumbuh', 'Jalan Balai Gadang Congkong No 134', 'A', 'raihan@gmail.com', '2024-05-05 19:10:40', '2024-05-05 19:11:43'),
(5, 'Hana Aliyah Puteri', 'P', 'Payakumbuh', '2003-03-19', 'Andrianiii', 'Islam', 'BPJS', 'Diploma', 'Mahasiswa', '100323456789', '10091234567890', '334455', '083124354567', 'Sumatera Barat', 'Kota Payakumbuh', 'Jalan Balai Gadang Congkong No 134', 'O', 'hana@gmail.com', '2024-05-06 18:33:47', '2024-05-06 19:42:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `id_pendaftaran` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id_pendaftaran` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `nomor_antrian` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftarans`
--

INSERT INTO `pendaftarans` (`id_pendaftaran`, `id_pasien`, `id_dokter`, `nomor_antrian`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '01', '2024-06-07', 'Kunjungan', '2024-05-05 19:14:56', '2024-05-07 10:38:12'),
(2, 2, 1, '02', '2024-03-05', 'Rekam Medis', '2024-05-05 19:15:18', '2024-05-05 19:15:18'),
(4, 4, 4, '02', '2024-06-07', 'Rekam Medis', '2024-05-07 10:32:14', '2024-05-07 10:35:27'),
(5, 3, 3, '04', '2023-12-12', 'Kunjungan', '2024-05-07 18:54:31', '2024-05-07 18:54:31'),
(6, 4, 6, '04', '2021-01-01', 'Rekam Medis', '2024-05-07 18:54:52', '2024-05-07 18:54:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_mediss`
--

CREATE TABLE `rekam_mediss` (
  `id_tindakan` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `nama_penyakit` varchar(30) NOT NULL,
  `keluhan` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `tindakan` varchar(35) NOT NULL,
  `deskripsi` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekam_mediss`
--

INSERT INTO `rekam_mediss` (`id_tindakan`, `id_pasien`, `id_dokter`, `nama_penyakit`, `keluhan`, `tanggal`, `tindakan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Hati', 'Nyeri', '2024-11-12', 'CT Scan', 'Periksa', '2024-05-07 09:56:53', '2024-05-07 09:56:53'),
(3, 1, 1, 'Telinga', 'Sakit Gendang Telinga', '2023-12-12', 'Penyuntikan', 'Periksa', '2024-05-07 23:28:00', '2024-05-07 23:28:00'),
(4, 4, 3, 'Hati', 'Nyeri', '2024-03-12', 'CT Scan', 'Pemeriksaan', '2024-05-07 23:30:40', '2024-05-07 23:30:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tanggal_registrasi` date NOT NULL,
  `nomor_telepon` char(16) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `nama_lengkap`, `tanggal_registrasi`, `nomor_telepon`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'adminnn', '2024-05-01', '083212345677', NULL, '$2y$12$l89ZZZBXUolVx64XcrwM4uK5gYbhOeBCDYWkbpKgK8s8qknbuDTRO', 'admin', NULL, NULL, NULL),
(2, 'Doctor', 'doctor@gamil.com', 'doctor', '2024-05-01', '083212345677', NULL, '$2y$12$NITO2Pkb5NPcfg1ch9YdQOJfzd46pb6r8FbpA.m4aye7rCaFI8FGm', 'doctor', NULL, NULL, NULL),
(3, 'Patient', 'patient@gmail.com', 'patient', '2024-05-01', '083212345677', NULL, '$2y$12$uJQqqE1meEtX6viWz./kfekQY9XWKkdv.uOE/QI4sO.veJYnnPks.', 'patient', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrians`
--
ALTER TABLE `antrians`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `antrians_id_pasien_foreign` (`id_pasien`);

--
-- Indeks untuk tabel `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jdwl_dokters`
--
ALTER TABLE `jdwl_dokters`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jdwl_dokters_id_dokter_foreign` (`id_dokter`);

--
-- Indeks untuk tabel `kunjungans`
--
ALTER TABLE `kunjungans`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `kunjungans_id_pasien_foreign` (`id_pasien`),
  ADD KEY `kunjungans_id_dokter_foreign` (`id_dokter`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `obats_id_pasien_foreign` (`id_pasien`);

--
-- Indeks untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayarans_id_pendaftaran_foreign` (`id_pendaftaran`);

--
-- Indeks untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `pendaftarans_id_pasien_foreign` (`id_pasien`),
  ADD KEY `pendaftarans_id_dokter_foreign` (`id_dokter`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rekam_mediss`
--
ALTER TABLE `rekam_mediss`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `rekam_mediss_id_pasien_foreign` (`id_pasien`),
  ADD KEY `rekam_mediss_id_dokter_foreign` (`id_dokter`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrians`
--
ALTER TABLE `antrians`
  MODIFY `id_antrian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id_dokter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jdwl_dokters`
--
ALTER TABLE `jdwl_dokters`
  MODIFY `id_jadwal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kunjungans`
--
ALTER TABLE `kunjungans`
  MODIFY `id_kunjungan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `obats`
--
ALTER TABLE `obats`
  MODIFY `id_obat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id_pasien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id_pendaftaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekam_mediss`
--
ALTER TABLE `rekam_mediss`
  MODIFY `id_tindakan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrians`
--
ALTER TABLE `antrians`
  ADD CONSTRAINT `antrians_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `jdwl_dokters`
--
ALTER TABLE `jdwl_dokters`
  ADD CONSTRAINT `jdwl_dokters_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id_dokter`);

--
-- Ketidakleluasaan untuk tabel `kunjungans`
--
ALTER TABLE `kunjungans`
  ADD CONSTRAINT `kunjungans_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id_dokter`),
  ADD CONSTRAINT `kunjungans_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `obats`
--
ALTER TABLE `obats`
  ADD CONSTRAINT `obats_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_id_pendaftaran_foreign` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftarans` (`id_pendaftaran`);

--
-- Ketidakleluasaan untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD CONSTRAINT `pendaftarans_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id_dokter`),
  ADD CONSTRAINT `pendaftarans_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `rekam_mediss`
--
ALTER TABLE `rekam_mediss`
  ADD CONSTRAINT `rekam_mediss_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id_dokter`),
  ADD CONSTRAINT `rekam_mediss_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
