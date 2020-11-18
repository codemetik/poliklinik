-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2020 pada 13.36
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
-- Stand-in struktur untuk tampilan `table_specialis_dokter`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `table_specialis_dokter` (
`id_specialis` char(15)
,`specialis` varchar(50)
,`id_user` varchar(15)
,`id_dokter` varchar(11)
,`nama_user` varchar(34)
,`jenis_kelamin` varchar(10)
,`gol_darah` varchar(10)
,`tempat_lahir` varchar(100)
,`tanggal_lahir` varchar(225)
,`agama` varchar(10)
,`tgl_masuk` varchar(225)
);

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
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_specialis` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `id_user`, `id_specialis`) VALUES
(3, 'USR0005', 'SPC003'),
(5, 'USR0006', 'SPC007'),
(7, 'USR0009', 'SPC016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hari`
--

CREATE TABLE `tb_hari` (
  `id_hari` int(15) NOT NULL,
  `nama_hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hari`
--

INSERT INTO `tb_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_praktek`
--

CREATE TABLE `tb_jadwal_praktek` (
  `id_jadwal_praktek` int(15) NOT NULL,
  `id_dokter` char(15) NOT NULL,
  `id_specialis` char(15) NOT NULL,
  `hari_awal` varchar(225) NOT NULL,
  `hari_akhir` varchar(225) NOT NULL,
  `waktu_buka` varchar(225) NOT NULL,
  `waktu_tutup` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal_praktek`
--

INSERT INTO `tb_jadwal_praktek` (`id_jadwal_praktek`, `id_dokter`, `id_specialis`, `hari_awal`, `hari_akhir`, `waktu_buka`, `waktu_tutup`) VALUES
(2, '5', 'SPC007', 'Senin', 'Rabu', '07:00', '05:00'),
(4, '7', 'SPC016', 'Senin', 'Sabtu', '08:00', '05:00'),
(5, '3', 'SPC003', 'Senin', 'Jumat', '08:00', '12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kelamin`
--

CREATE TABLE `tb_jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_kelamin`
--

INSERT INTO `tb_jenis_kelamin` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` char(15) NOT NULL,
  `id_dokter` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `no_antrian` char(15) NOT NULL,
  `no_rekam_medis` char(15) NOT NULL,
  `waktu` varchar(225) NOT NULL,
  `hari` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `id_dokter`, `id_user`, `no_antrian`, `no_rekam_medis`, `waktu`, `hari`) VALUES
('PSN0001', '3', 'USR0010', 'AN0001', 'RM0001', '', ''),
('PSN0002', '5', 'USR0011', 'AN0002', 'RM0002', '', '');

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
('ROLS0003', 'USR0003', 'BG002', ''),
('ROLS0005', 'USR0005', 'BG003', '2020-11-09 10:47:37'),
('ROLS0006', 'USR0006', 'BG003', '2020-11-10 08:19:05'),
('ROLS0007', 'USR0007', 'BG002', '2020-11-10 08:54:33'),
('ROLS0009', 'USR0009', 'BG003', '2020-11-11 08:47:02'),
('ROLS0010', 'USR0010', 'BG004', '2020-11-18 02:18:55'),
('ROLS0011', 'USR0011', 'BG004', '2020-11-18 02:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_specialis`
--

CREATE TABLE `tb_specialis` (
  `id_specialis` char(15) NOT NULL,
  `specialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_specialis`
--

INSERT INTO `tb_specialis` (`id_specialis`, `specialis`) VALUES
('SPC001', 'Kandungan'),
('SPC002', 'Kulit'),
('SPC003', 'Psikologi Klinis'),
('SPC004', 'Anak'),
('SPC005', 'Penyakit Dalam'),
('SPC006', 'Gigi'),
('SPC007', 'Jiwa'),
('SPC008', 'Bedah'),
('SPC009', 'Saraf'),
('SPC010', 'Gizi Klinik'),
('SPC011', 'Jantung'),
('SPC012', 'THT'),
('SPC013', 'Mata'),
('SPC014', 'Paru'),
('SPC015', 'Medikolegal & Hukum Kesehatan'),
('SPC016', 'Hewan'),
('SPC017', 'Fisik & Rehabilitasi'),
('SPC018', 'Dokter Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gol_darah` varchar(10) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tgl_masuk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `confirm_password`, `nama_user`, `jenis_kelamin`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `agama`, `tgl_masuk`) VALUES
('USR0001', 'admin', 'admin', 'admin', 'admin', 'Perempuan', 'A', 'Palembang', '1992-11-03', 'Islam', ''),
('USR0003', 'staff', 'staff', 'staff', 'staff', 'Laki-laki', 'D', 'Semarang', '2020-11-03', 'Islam', ''),
('USR0005', 'admin10', 'admin10', 'admin10', 'Maratun', 'Laki-laki', 'B', 'Pamulang', '1983-06-22', 'islam', '2020-11-09 10:47:37'),
('USR0006', 'mimin', 'mimin', 'mimin', 'miminahku', 'Perempuan', 'C', 'Jakarta', '1989-02-07', 'Islam', '2020-11-10 08:19:05'),
('USR0007', 'dia', 'dian', 'dian', 'diandi', 'Laki-laki', 'A', 'Tangerang', '2020-11-02', 'Islam', '2020-11-10 08:54:33'),
('USR0009', 'jiwa', 'jiwa', 'jiwa', 'jiwa', 'Laki-laki', 'A', 'Bali', '2020-11-04', 'Islam', '2020-11-11 08:47:02'),
('USR0010', 'pasien1', 'pasien1', 'pasien1', 'pasien1', 'Laki-laki', 'B', 'Pamulang', '1993-02-10', 'Islam', '2020-11-18 02:18:55'),
('USR0011', 'pasien2', 'pasien2', 'pasien2', 'pasien2', 'Perempuan', 'A', 'Bandung', '1994-09-12', 'Islam', '2020-11-18 02:53:17');

-- --------------------------------------------------------

--
-- Struktur untuk view `table_specialis_dokter`
--
DROP TABLE IF EXISTS `table_specialis_dokter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `table_specialis_dokter`  AS  (select `x`.`id_specialis` AS `id_specialis`,`x`.`specialis` AS `specialis`,ifnull(`z`.`id_user`,'kosong') AS `id_user`,ifnull(`y`.`id_dokter`,'kosong') AS `id_dokter`,concat('Dr. ',ifnull(`z`.`nama_user`,'kosong')) AS `nama_user`,ifnull(`z`.`jenis_kelamin`,'kosong') AS `jenis_kelamin`,ifnull(`z`.`gol_darah`,'kosong') AS `gol_darah`,ifnull(`z`.`tempat_lahir`,'kosong') AS `tempat_lahir`,ifnull(`z`.`tanggal_lahir`,'kosong') AS `tanggal_lahir`,ifnull(`z`.`agama`,'kosong') AS `agama`,ifnull(`z`.`tgl_masuk`,'kosong') AS `tgl_masuk` from ((`tb_specialis` `x` left join `tb_dokter` `y` on(`y`.`id_specialis` = `x`.`id_specialis`)) left join `tb_user` `z` on(`z`.`id_user` = `y`.`id_user`)) group by `x`.`id_specialis`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_specialis` (`id_specialis`);

--
-- Indeks untuk tabel `tb_hari`
--
ALTER TABLE `tb_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `tb_jadwal_praktek`
--
ALTER TABLE `tb_jadwal_praktek`
  ADD PRIMARY KEY (`id_jadwal_praktek`);

--
-- Indeks untuk tabel `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD PRIMARY KEY (`id_rols_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `tb_specialis`
--
ALTER TABLE `tb_specialis`
  ADD PRIMARY KEY (`id_specialis`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_hari`
--
ALTER TABLE `tb_hari`
  MODIFY `id_hari` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_praktek`
--
ALTER TABLE `tb_jadwal_praktek`
  MODIFY `id_jadwal_praktek` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD CONSTRAINT `tb_dokter_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dokter_ibfk_2` FOREIGN KEY (`id_specialis`) REFERENCES `tb_specialis` (`id_specialis`) ON DELETE CASCADE ON UPDATE CASCADE;

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
