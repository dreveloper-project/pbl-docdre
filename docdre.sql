-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 15.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docdre`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_surat` int(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_surat`
--

CREATE TABLE `penerima_surat` (
  `id_terima` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_surat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id_surat` int(50) NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_tugas`
--

INSERT INTO `surat_tugas` (`id_surat`, `nama_surat`, `id_user`, `deskripsi`, `tanggal`) VALUES
(4, 'Daftar Hadir Green Tech 2 -11.pdf', 4, 'daftar hadir', '2023-11-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `nomor_induk` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `password`, `role`, `nomor_induk`, `prodi`, `email`, `nomor_telepon`, `alamat`) VALUES
(4, 'adminpoltek', '$2y$10$HmJrdexKPIMSVl7RS8mXYumoNLF49FYKPveuAakqPvp3a/0PglE32', 'Admin', '23456', 'DIII Teknologi Informasi', 'andremikhael@gmail.com', '0987777733', 'BTN'),
(5, 'Jetry CH', '$2y$10$wBCguF56Jr8sv5rLTTtkBeV1h.xlP/fMGcwtUXckEzaFLQG/QjpHq', 'Dosen', '234587', 'DIV Pengelolaan Perhotelan', 'andremikhael@gmail.com', '0987777733', 'BTN'),
(7, 'dremikhael', '$2y$10$2eeSsfJykjtOkL5AloB77eX0LyypowmaQz8oTcoQUExego7037Jgi', 'Admin', '123456', 'DIII Ekowisata', 'dermikhael18@gmail.com', '085962524623', '7755, Cicinati, IDG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indeks untuk tabel `penerima_surat`
--
ALTER TABLE `penerima_surat`
  ADD PRIMARY KEY (`id_terima`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indeks untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id_surat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`id_surat`) REFERENCES `surat_tugas` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penerima_surat`
--
ALTER TABLE `penerima_surat`
  ADD CONSTRAINT `penerima_surat_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat_tugas` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerima_surat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD CONSTRAINT `surat_tugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
