-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2020 pada 02.47
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poliklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` char(15) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`) VALUES
('BG001', 'admin'),
('BG002', 'Staff Pendaftaran'),
('BG003', 'Dokter'),
('BG004', 'Pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_admin`
--

CREATE TABLE `tb_profile_admin` (
  `id_admin` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `tgl_masuk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profile_admin`
--

INSERT INTO `tb_profile_admin` (`id_admin`, `id_user`, `nama_admin`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `tgl_masuk`) VALUES
('ADM0001', 'USR0001', 'mila', 'Laki-laki', 'Pamulang', '', 'Islam', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_dokter`
--

CREATE TABLE `tb_profile_dokter` (
  `id_dokter` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `nama_dokter` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `specialis` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tgl_masuk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profile_dokter`
--

INSERT INTO `tb_profile_dokter` (`id_dokter`, `id_user`, `nama_dokter`, `jenis_kelamin`, `specialis`, `tempat_lahir`, `tanggal_lahir`, `agama`, `tgl_masuk`) VALUES
('DOK0001', 'USR0004', 'Yudi', 'Laki-laki', 'Telinga', 'Tangerang', '', 'Islam', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_pasien`
--

CREATE TABLE `tb_profile_pasien` (
  `id_pasien` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tgl_masuk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profile_pasien`
--

INSERT INTO `tb_profile_pasien` (`id_pasien`, `id_user`, `nama_pasien`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `tgl_masuk`) VALUES
('PSN', 'USR0002', 'dedek', 'Perempuan', 'Depok', '', 'Islam', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_user`
--

CREATE TABLE `tb_rols_user` (
  `id_rols_user` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_bagian` char(15) NOT NULL,
  `tgl_user_regis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_user`
--

INSERT INTO `tb_rols_user` (`id_rols_user`, `id_user`, `id_bagian`, `tgl_user_regis`) VALUES
('ROLS0001', 'USR0001', 'BG001', ''),
('ROLS0002', 'USR0002', 'BG004', ''),
('ROLS0003', 'USR0003', 'BG002', ''),
('ROLS0004', 'USR0004', 'BG003', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `confirm_password`) VALUES
('USR0001', 'admin', 'admin', 'admin'),
('USR0002', 'pasien1', 'pasien1', 'pasien1'),
('USR0003', 'staff', 'staff', 'staff'),
('USR0004', 'dokter', 'dokter', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_profile_admin`
--
ALTER TABLE `tb_profile_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_profile_dokter`
--
ALTER TABLE `tb_profile_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_profile_pasien`
--
ALTER TABLE `tb_profile_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD PRIMARY KEY (`id_rols_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_profile_admin`
--
ALTER TABLE `tb_profile_admin`
  ADD CONSTRAINT `tb_profile_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_profile_dokter`
--
ALTER TABLE `tb_profile_dokter`
  ADD CONSTRAINT `tb_profile_dokter_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_profile_pasien`
--
ALTER TABLE `tb_profile_pasien`
  ADD CONSTRAINT `tb_profile_pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD CONSTRAINT `tb_rols_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rols_user_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `tb_bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
