-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2025 pada 08.26
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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`npk`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_plant_id_foreign` (`plant_id`);

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
