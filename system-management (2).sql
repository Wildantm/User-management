-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2025 pada 08.28
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system-management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('beranda-cache-141414|127.0.0.1', 'i:4;', 1756175546),
('beranda-cache-141414|127.0.0.1:timer', 'i:1756175546;', 1756175546);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_departement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departements`
--

INSERT INTO `departements` (`id`, `nama_departement`, `created_at`, `updated_at`) VALUES
(1, 'Public Relation', '2025-08-25 19:08:49', '2025-08-25 20:41:45'),
(2, 'IT', '2025-08-25 19:48:06', '2025-08-25 19:48:06'),
(3, 'Human Resource', '2025-08-25 20:39:32', '2025-08-25 20:39:32'),
(4, 'General Affairs', '2025-08-25 20:39:42', '2025-08-25 20:39:42'),
(5, 'Marketing', '2025-08-25 20:39:51', '2025-08-25 20:39:51'),
(6, 'Production', '2025-08-25 20:40:05', '2025-08-25 20:40:05'),
(7, 'Accounting', '2025-08-25 20:40:15', '2025-08-25 20:40:15'),
(8, 'Finance', '2025-08-25 20:40:22', '2025-08-25 20:40:22'),
(9, 'Purchasing', '2025-08-25 20:40:29', '2025-08-25 20:40:29'),
(10, 'Research & Development', '2025-08-25 20:40:53', '2025-08-25 20:40:53'),
(11, 'CSR', '2025-08-25 20:41:06', '2025-08-25 20:41:06'),
(12, 'Quality Control', '2025-08-25 20:42:00', '2025-08-25 20:42:00'),
(13, 'HSE', '2025-08-25 20:42:11', '2025-08-25 20:42:11');

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
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'IT Consultant', '2025-08-25 20:03:33', '2025-08-25 20:03:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_20_023511_plant', 1),
(5, '2025_08_20_023522_departement', 1),
(6, '2025_08_20_023537_jabatan', 1),
(7, '2025_08_22_030601_add_role_to_users_table', 2),
(8, '2025_08_22_080615_add_detail_fields_to_users_table', 3),
(9, '2025_08_22_080808_create_keluargas_table', 4),
(10, '2025_08_22_081137_create_keluargas_table', 5),
(11, '2025_08_22_084924_add_nohp_to_users_table', 5),
(12, '2025_08_25_001458_add_keluarga_fields_to_users_table', 6),
(13, '2025_08_25_062839_add_plant_id_to_users_table', 7),
(16, '2025_08_26_005457__add_detail_id_to_users_table', 8),
(17, '2025_08_26_023522_departement', 9);

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
-- Struktur dari tabel `plants`
--

CREATE TABLE `plants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_plant` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `plants`
--

INSERT INTO `plants` (`id`, `nama_plant`, `lokasi`, `created_at`, `updated_at`) VALUES
(2, 'PT Dharma PoliPlast', 'Cikarang', '2025-08-19 23:24:41', '2025-08-25 20:34:19'),
(4, 'PT Dharma Polimetal TBK', 'Cikarang Selatan', '2025-08-20 01:18:41', '2025-08-25 20:34:43'),
(5, 'PT Dharma Control Cable Indonesia', 'Cikarang Pusat', '2025-08-21 18:15:29', '2025-08-25 20:36:13'),
(6, 'PT Dharma Electrindo Mfg', 'Cikarang', '2025-08-25 00:34:27', '2025-08-25 20:35:07'),
(7, 'PT Dharma Precision Parts', 'Cikarang', '2025-08-25 00:40:16', '2025-08-25 20:35:28'),
(8, 'PT Dharma Precision Tools', 'Cikarang', '2025-08-25 19:46:58', '2025-08-25 20:35:48'),
(10, 'PT Dharma Kyungshin Indonesia', 'Jakarta', '2025-08-25 20:27:45', '2025-08-25 20:27:45'),
(15, 'PT Sankei Dharma Indonesia', 'Cirebon', '2025-08-25 20:36:35', '2025-08-25 20:36:35'),
(16, 'PT Saikono Otoparts Indonesia', 'Cirebon', '2025-08-25 20:36:56', '2025-08-25 20:36:56'),
(17, 'PT Trimitra Chitrahasta', 'Cirebon', '2025-08-25 20:37:14', '2025-08-25 20:37:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cDpjE1zJNFkhGs9aO7zbONt6tEgqlibWuVIwgrbn', 11250599, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWVCRUZrVGp0S1hONE40WXlTcHVma2NoSDhUdktLdHVUYjZkcUp6diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXBhcnRlbWVudHMvY3JlYXRlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6ODoiMTEyNTA1OTkiO30=', 1756183238),
('XL5m1yxwgyrdh2NG8kzWaSd2Try8jEktSlHVMH8Z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVVkRVJQSUU1aEVmWXA1M3RXWVp0cXRrYnpkaWpZelpkSjI3ckxoMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1756176351);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `npk` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','supervisor','user') NOT NULL DEFAULT 'user',
  `nohp` int(16) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_bpjs` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `no_npwp` varchar(255) DEFAULT NULL,
  `plant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jabatan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`npk`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `nohp`, `tempat_lahir`, `tanggal_lahir`, `no_bpjs`, `no_ktp`, `no_npwp`, `plant_id`, `departement_id`, `jabatan_id`) VALUES
('11250599', 'Wildan Trio Munawarudin', 'wildan@gmail.com', NULL, '$2y$12$dZGYewIqR1laB0I7hYfxwuoo2KKFkLdEtibPDEEAt8Iyy89eAVhS2', 'OVGSSRTHdmabEGdknjGHoGi5dDakViJA36nxynqQZePxWimQUzJMcD9F0IK8', '2025-08-25 21:10:59', '2025-08-25 21:39:31', 'admin', 159159, NULL, NULL, NULL, NULL, NULL, 2, 6, 1),
('123', 'paaaaaa', 'poo@gmail.com', NULL, '$2y$12$B8jLO8YZ1j1AeRtQeirbOetC3VQ7B8RNu987wfW6AUL/ruB.OrJbG', NULL, '2025-08-25 21:15:01', '2025-08-25 21:35:13', 'user', 548484, NULL, NULL, NULL, NULL, NULL, 5, 13, 1),
('1515', 'dina nurul', 'dinanurul@gmail.com', NULL, '$2y$12$PDkD2hdTF5YSiT74Qf20.O/x2OBZHuCAbiGu2FPPS9MiO5MCBOkt2', NULL, '2025-08-25 07:56:25', '2025-08-25 20:47:58', 'user', 1414141, NULL, NULL, NULL, NULL, NULL, 5, 13, 1),
('159357', 'lulu', 'kocak@gmail.com', NULL, '$2y$12$OmeWO5c1lh0DIgjUOAnuvuzDcoPYXbkXj7An2Zto9ZdjbXSxUssvq', 'nDYe8pGDRceyCRdmAcSaJiGBGjMMBgwOkMaFTUxTkW8hBYxXOBt3sEwiBD7f', '2025-08-25 01:09:12', '2025-08-25 20:09:21', 'user', 454654654, NULL, NULL, NULL, NULL, NULL, 5, 2, 1),
('357159', 'namoon', 'namoon@gmail.com', NULL, '$2y$12$ESBHV8wfahmBEGYxqtzbDOczmbidk/.fYSBsSEl/.cIwIzJbDZ/1G', 'LwwMVFXddPFcHGJvdKk4x8UMtsNufJVcnLTm1YD4OMUJrkfbXpPUeev2tIqd', '2025-08-24 19:32:39', '2025-08-25 20:13:49', 'admin', 54548, 'bekasi', '2025-05-30', '5545', '4454', '4', 5, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_plant` (`nama_plant`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`npk`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_plant_id_foreign` (`plant_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `plants`
--
ALTER TABLE `plants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
