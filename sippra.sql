-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2022 pada 08.05
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nta` bigint(11) NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','Lainya','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Protestan','Lainya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` enum('Pembina','Pembantu Pembina','Dewan Galang','Penggalang Ramu','Penggalang Rakit','Penggalang Terap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('Kamabigus','Pembina Utama','Pelatih Lapangan','Pratama Putra','Pratama Putri','Pemimpin','Wakil Pemimpin Regu','Sekretaris','Bendahara','Operator','Tenaga IT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `slug`, `kode_admin`, `nama_admin`, `nta`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `tlp`, `agama`, `golongan`, `jabatan`, `pangkalan`, `foto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'Adiba Salwa Salsabil', 1133130960500003, 'Semarang', '2001-02-02', 'Perempuan', 'fsfs', '65464', 'Islam', 'Pembina', 'Operator', 'SMPN 43 Semarang', 'o.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `kode_b` int(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`kode_b`, `judul`, `kategori`, `isi`, `foto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka garuda', 'nformasi', 'View data berita menampilkan hasil input data berita. Rancangan antarmuka view data berita sebagai berikut, View data berita menampilkan hasil input data berita. Rancangan antarmuka view data berita sebagai berikut :, View data berita menampilkan hasil input data berita. Rancangan antarmuka view data berita sebagai berikut :', 'garuda.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_ja` int(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_kegiatan` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kode_ja`, `nama_kegiatan`, `hari_kegiatan`, `tanggal_kegiatan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Latihan rutin', 'Kamis', '2022-02-03 15:41:30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_12_014734_add_roles_field_to_users_table', 1),
(5, '2021_09_13_213016_add_username_field_to_users_table', 2),
(6, '2021_09_18_072215_create_kelas_table', 3),
(7, '2021_09_18_143728_create_semester_table', 4),
(8, '2021_09_18_151101_create_tapel_table', 5),
(9, '2021_09_18_152524_create_jabatan_table', 6),
(10, '2022_02_02_081052_create_jadwal_table', 7),
(11, '2022_02_02_083624_create_jadwal_table', 8),
(12, '2022_02_02_090124_create_berita_table', 9),
(13, '2022_02_02_091924_create_presensi_table', 10),
(14, '2022_02_02_120814_create_dpembina_table', 11),
(15, '2022_02_02_125248_create_dadmin_table', 12),
(16, '2022_02_02_132131_create_dsiswa_table', 13),
(17, '2022_02_04_144408_create_dadmin_table', 14),
(18, '2022_02_05_012627_create_admin_table', 15),
(19, '2022_02_05_043400_create_pembina_table', 16),
(20, '2022_02_05_053256_create_siswa_table', 17),
(21, '2022_02_05_053720_create_siswa_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('qiqi@gmail.com', '$2y$10$WbBEsYW9YBuTG8URXaDhi.l.E/b27SVdRHWpnwUGiBCnM1RHuSm66', '2015-01-02 17:09:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembina`
--

CREATE TABLE `pembina` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pembina` int(11) NOT NULL,
  `nama_pembina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nta` bigint(11) NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','Lainnya','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Potestan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` enum('Pembina','Pembantu Pembina','Dewan Galang','Penggalang Ramu','Penggalang Rakit','Penggalang Terap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('Kamabigus','Pembina Utama','Pelatih Lapangan','Pratama Putra','Pratama Putri','Pemimpin Regu','Wakil Pemimpin Regu','Sekretaris','Bendahara','Operator','Tenaga IT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembina`
--

INSERT INTO `pembina` (`id`, `slug`, `kode_pembina`, `nama_pembina`, `nta`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `tlp`, `agama`, `golongan`, `jabatan`, `pangkalan`, `foto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'Susi Susanti', 1133130960500003, 'Semarang', '2001-02-07', 'Perempuan', 'ssf', '76556', 'Islam', 'Pembina', 'Tenaga IT', 'adsdsad', 'm.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `kode_presensi` int(20) UNSIGNED NOT NULL,
  `kode_tp` int(10) UNSIGNED NOT NULL,
  `kode_j` int(10) UNSIGNED NOT NULL,
  `kode_k` int(10) UNSIGNED NOT NULL,
  `kode_s` int(10) UNSIGNED NOT NULL,
  `kode_siswa` int(10) UNSIGNED NOT NULL,
  `kode_pembina` int(10) UNSIGNED NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sakit` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nta` bigint(11) NOT NULL,
  `kelas` enum('VII A','VII B','VII C','VII D','VII E','VII F','VIII A','VIII B','VIII C','VIII D','VIII E','VIII F','IX A','IX B','IX C','IX D','IX E','IX F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','Lainya','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Protestan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` enum('Pembina','Pembantu Pembina','Dewan Galang','Penggalang Ramu','Penggalang Rakit','Penggalang Terap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('Kamabigus','Pembina Utama','Pelatih Lapangan','Pratama Putra','Pratama Putri','Pemimpin Regu','Wakil Pemimpin Regu','Sekretaris','Bendahara','Operator','Tenaga IT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `slug`, `kode_siswa`, `nama_siswa`, `nta`, `kelas`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `tlp`, `agama`, `golongan`, `jabatan`, `pangkalan`, `foto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'Qiswatul Ulfah', 1133130960500003, 'VII E', 'Semarang', '2005-02-15', 'Perempuan', 'fsfa', '23313', 'Islam', 'Dewan Galang', 'Operator', 'wwqrwq', 'd.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `username`) VALUES
(17, 'Adiba Salwa Salsabil', 'assalsabil@gmail.com', NULL, '$2y$10$Bi81PHwnRUPME/a24SyoBeRRTxjV7MqCDquk058fnzV4VWT4yTvUK', NULL, '2022-02-01 10:44:52', '2022-02-01 10:44:52', 'ADMIN', 'Salwa'),
(18, 'Qiswatul ulfah', 'qiswatululfah@gmail.com', NULL, '$2y$10$Z7jpx2iS9LG0F4302OEJzO6oNSY4X6t0AxARtH.qxFhVkHIvUIxlW', NULL, '2022-02-01 10:59:43', '2022-02-01 10:59:43', 'USER', 'Qiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kode_b`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_ja`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`kode_presensi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `kode_b` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_ja` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `kode_presensi` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
