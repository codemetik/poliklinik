-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2021 pada 10.51
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
-- Struktur dari tabel `posting_pendaftaran`
--

CREATE TABLE `posting_pendaftaran` (
  `id_posting` int(15) NOT NULL,
  `judul` varchar(15) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posting_pendaftaran`
--

INSERT INTO `posting_pendaftaran` (`id_posting`, `judul`, `deskripsi`) VALUES
(1, 'Pasien Baru', 'Bagi pasien baru atau pertama kali akan melakukan pendaftaran pasien silahkan REGISTRASI terlebih dahulu kemudianlakukan login untuk melakukan pendaftaran lebih lanjut.'),
(2, 'Pasien Lama', 'Bagi pasien lama atau yang sudah pernah periksa, silahkan langsung melakukan login untuk pendaftaran pasien.');

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
-- Struktur dari tabel `tb_control`
--

CREATE TABLE `tb_control` (
  `id` int(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_control`
--

INSERT INTO `tb_control` (`id`, `status`) VALUES
(1, 'On');

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
(10, 'USR0013', 'SPC001'),
(11, 'USR0014', 'SPC002');

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
(6, '10', 'SPC001', 'Senin', 'Sabtu', '08:00', '16:00'),
(7, '11', 'SPC002', 'Senin', 'Sabtu', '08:00', '16:00');

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
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(225) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_pasien` char(15) NOT NULL,
  `id_dokter` char(15) NOT NULL,
  `no_rekam_medis` varchar(50) NOT NULL,
  `no_antrian` varchar(50) NOT NULL,
  `hari_periksa_pasien` varchar(10) NOT NULL,
  `tgl_periksa` varchar(225) NOT NULL,
  `waktu_mulai_antri` varchar(20) NOT NULL,
  `waktu_selesai_periksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `id_user`, `id_pasien`, `id_dokter`, `no_rekam_medis`, `no_antrian`, `hari_periksa_pasien`, `tgl_periksa`, `waktu_mulai_antri`, `waktu_selesai_periksa`) VALUES
(5, 'USR0012', 'PSN0001', '10', 'RM-20201220-0001', 'AN-20210112-0001', 'Selasa', '2021-01-12', '11:03:59', '11:06:13'),
(6, 'USR0015', 'PSN0003', '11', 'RM-20201221-0003', 'AN-20210112-0002', 'Selasa', '2021-01-12', '11:04:14', '11:10:30'),
(7, 'USR0016', 'PSN0002', '10', 'RM-20201220-0002', 'AN-20210112-0003', 'Selasa', '2021-01-12', '11:04:34', '11:09:02'),
(8, 'USR0017', 'PSN0004', '11', 'RM-20201226-0004', 'AN-20210112-0004', 'Selasa', '2021-01-12', '11:04:56', '11:10:18'),
(10, 'USR0018', 'PSN0005', '10', 'RM-20210121-0005', 'AN-20210121-0005', 'Kamis', '2021-01-21', '09:06:42', '09:08:40'),
(11, 'USR0018', 'PSN0005', '11', 'RM-20210121-0005', 'AN-20210121-0001', 'Kamis', '2021-01-21', '09:21:01', ''),
(12, 'USR0019', 'PSN0006', '10', 'RM-20210121-0006', 'AN-20210121-0006', 'Kamis', '2021-01-21', '09:21:35', ''),
(13, 'USR0018', 'PSN0005', '11', 'RM-20210121-0005', 'AN-20210215-0001', 'Senin', '2021-02-15', '02:36:45', '03:42:11'),
(14, 'USR0012', 'PSN0001', '10', 'RM-20201220-0001', 'AN-20210227-0001', 'Sabtu', '2021-02-27', '06:49:58', '01:15:52'),
(15, 'USR0015', 'PSN0003', '11', 'RM-20201221-0003', 'AN-20210227-0002', 'Sabtu', '2021-02-27', '07:01:32', '01:29:30'),
(16, 'USR0012', 'PSN0001', '10', 'RM-20201220-0001', 'AN-20210227-0001', 'Sabtu', '2021-02-27', '01:33:00', ''),
(17, 'USR0015', 'PSN0003', '11', 'RM-20201221-0003', 'AN-20210227-0002', 'Sabtu', '2021-02-27', '01:33:48', ''),
(18, 'USR0016', 'PSN0002', '10', 'RM-20201220-0002', 'AN-20210227-0003', 'Sabtu', '2021-02-27', '01:35:34', ''),
(19, 'USR0017', 'PSN0004', '11', 'RM-20201226-0004', 'AN-20210227-0004', 'Sabtu', '2021-02-27', '01:35:51', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` char(15) NOT NULL,
  `id_dokter` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `no_antrian` char(16) NOT NULL,
  `no_rekam_medis` char(16) NOT NULL,
  `waktu` varchar(225) NOT NULL,
  `hari_periksa` varchar(225) NOT NULL,
  `nomor_antri` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `id_dokter`, `id_user`, `no_antrian`, `no_rekam_medis`, `waktu`, `hari_periksa`, `nomor_antri`) VALUES
('PSN0001', '10', 'USR0012', 'AN-20210227-0001', 'RM-20201220-0001', '01:33:00', 'Sabtu', 'ANTRIAN001'),
('PSN0002', '10', 'USR0016', 'AN-20210227-0003', 'RM-20201220-0002', '01:35:34', 'Sabtu', 'ANTRIAN003'),
('PSN0003', '11', 'USR0015', 'AN-20210227-0002', 'RM-20201221-0003', '01:33:48', 'Sabtu', 'ANTRIAN002'),
('PSN0004', '11', 'USR0017', 'AN-20210227-0004', 'RM-20201226-0004', '01:35:51', 'Sabtu', 'ANTRIAN004'),
('PSN0005', '11', 'USR0018', '', 'RM-20210121-0005', '', '', ''),
('PSN0006', '10', 'USR0019', '', 'RM-20210121-0006', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien_baru`
--

CREATE TABLE `tb_pasien_baru` (
  `no_antrian` char(16) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `tgl_user_regis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien_baru`
--

INSERT INTO `tb_pasien_baru` (`no_antrian`, `hari`, `id_user`, `tgl_user_regis`) VALUES
('AN-20201220-0001', 'Minggu', 'USR0012', '2020-12-20 02:06:57'),
('AN-20201220-0002', 'Minggu', 'USR0015', '2020-12-20 09:52:56'),
('AN-20201220-0003', 'Minggu', 'USR0016', '2020-12-20 10:21:26'),
('AN-20201226-0004', 'Sabtu', 'USR0017', '2020-12-26 03:46:30'),
('AN-20210121-0005', 'Kamis', 'USR0018', '2021-01-21 08:58:23'),
('AN-20210121-0006', 'Kamis', 'USR0019', '2021-01-21 09:09:15');

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
('ROLS0005', 'USR0005', 'BG003', '2020-11-09 10:47:37'),
('ROLS0006', 'USR0006', 'BG003', '2020-11-10 08:19:05'),
('ROLS0009', 'USR0009', 'BG003', '2020-11-11 08:47:02'),
('ROLS0010', 'USR0010', 'BG001', '2020-12-20 02:04:48'),
('ROLS0011', 'USR0011', 'BG002', '2020-12-20 02:05:45'),
('ROLS0012', 'USR0012', 'BG004', '2020-12-20 02:06:57'),
('ROLS0013', 'USR0013', 'BG003', '2020-12-20 02:27:56'),
('ROLS0014', 'USR0014', 'BG003', '2020-12-20 09:49:00'),
('ROLS0015', 'USR0015', 'BG004', '2020-12-20 09:52:56'),
('ROLS0016', 'USR0016', 'BG004', '2020-12-20 10:21:26'),
('ROLS0017', 'USR0017', 'BG004', '2020-12-26 03:46:30'),
('ROLS0018', 'USR0018', 'BG004', '2021-01-21 08:58:23'),
('ROLS0019', 'USR0019', 'BG004', '2021-01-21 09:09:15');

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
('SPC001', 'Dokter Umum'),
('SPC002', 'Gigi');

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
('USR0005', 'admin10', 'admin10', 'admin10', 'Maratun', 'Laki-laki', 'B', 'Pamulang', '1983-06-22', 'islam', '2020-11-09 10:47:37'),
('USR0006', 'mimin', 'mimin', 'mimin', 'miminahku', 'Perempuan', 'C', 'Jakarta', '1989-02-07', 'Islam', '2020-11-10 08:19:05'),
('USR0009', 'jiwa', 'jiwa', 'jiwa', 'jiwa', 'Laki-laki', 'A', 'Bali', '2020-11-04', 'Islam', '2020-11-11 08:47:02'),
('USR0010', 'admin', 'admin', 'admin', 'admin', 'Laki-laki', 'B', 'Pamulang', '2020-04-30', 'Islam', '2020-12-20 02:04:48'),
('USR0011', 'staff', 'staff', 'staff', 'staff', 'Laki-laki', 'A', 'Pamulang', '2020-01-02', 'Islam', '2020-12-20 02:05:45'),
('USR0012', 'akupasien', 'akupasien', 'akupasien', 'akupasien', 'Laki-laki', 'B', 'Pamulang', '2020-01-02', 'Islam', '2020-12-20 02:06:57'),
('USR0013', 'mydokter', 'mydokter', 'mydokter', 'mydokter', 'Perempuan', 'B', 'Pamulang', '2020-01-02', 'Islam', '2020-12-20 02:27:56'),
('USR0014', 'mygigi', 'mygigi', 'mygigi', 'mygigi', 'Perempuan', 'Islam', 'Tangerang', '2020-05-01', 'Islam', '2020-12-20 09:49:00'),
('USR0015', 'pasien1', 'pasien1', 'pasien1', 'pasien1', 'Perempuan', 'B', 'Pamulang', '2020-03-06', 'Islam', '2020-12-20 09:52:56'),
('USR0016', 'pasien2', 'pasien2', 'pasien2', 'pasien2', 'Perempuan', 'B', 'Jakarta', '2020-05-01', 'Islam', '2020-12-20 10:21:26'),
('USR0017', 'Mila', 'mila', 'mila', 'mila', 'Perempuan', 'B', 'Depok', '1984-07-04', 'islam', '2020-12-26 03:46:30'),
('USR0018', 'aku', 'aku', 'aku', 'Akukamu', 'Laki-laki', 'B', 'Bekasi', '2021-01-21', 'Islam', '2021-01-21 08:58:23'),
('USR0019', 'dia', 'dia', 'dia', 'aku dan dia', 'Perempuan', 'A', 'Jakarta', '2021-01-21', 'Kristen', '2021-01-21 09:09:15');

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
-- Indeks untuk tabel `posting_pendaftaran`
--
ALTER TABLE `posting_pendaftaran`
  ADD PRIMARY KEY (`id_posting`);

--
-- Indeks untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_control`
--
ALTER TABLE `tb_control`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD KEY `no_antrian` (`no_antrian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pasien_baru`
--
ALTER TABLE `tb_pasien_baru`
  ADD PRIMARY KEY (`no_antrian`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT untuk tabel `posting_pendaftaran`
--
ALTER TABLE `posting_pendaftaran`
  MODIFY `id_posting` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_control`
--
ALTER TABLE `tb_control`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_hari`
--
ALTER TABLE `tb_hari`
  MODIFY `id_hari` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_praktek`
--
ALTER TABLE `tb_jadwal_praktek`
  MODIFY `id_jadwal_praktek` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- Ketidakleluasaan untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD CONSTRAINT `tb_pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pasien_baru`
--
ALTER TABLE `tb_pasien_baru`
  ADD CONSTRAINT `tb_pasien_baru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
