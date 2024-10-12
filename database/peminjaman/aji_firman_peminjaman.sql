-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Feb 2021 pada 16.32
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aji_firman_peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicilan_pinjaman`
--

CREATE TABLE IF NOT EXISTS `cicilan_pinjaman` (
  `id_cicilan_pinjaman` varchar(15) NOT NULL,
  `id_pinjaman` varchar(15) NOT NULL,
  `cicilan_pinjaman` int(11) DEFAULT NULL,
  `cicilan_perbulan` int(11) DEFAULT NULL,
  `tgl_jatuh_tempo` varchar(15) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cicilan_ke` int(11) DEFAULT NULL,
  `tgl_bayar` varchar(15) DEFAULT NULL,
  `time_bayar` varchar(15) DEFAULT NULL,
  `status_lunas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `NIP` varchar(25) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(15) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` int(11) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_dana`
--

CREATE TABLE IF NOT EXISTS `pemakaian_dana` (
  `id_pemakaian_dana` int(15) NOT NULL,
  `id_pinjaman` int(15) NOT NULL,
  `NIP` int(15) NOT NULL,
  `pemakaian_dana` text,
  `tgl_pemakaian` varchar(15) DEFAULT NULL,
  `time_pemakaian` varchar(15) DEFAULT NULL,
  `rekening_peminjam` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan_dana`
--

CREATE TABLE IF NOT EXISTS `penarikan_dana` (
  `id_penarikan_dana` varchar(15) NOT NULL,
  `id_pinjaman` varchar(15) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `id_transfer_dana_pinjaman` varchar(15) NOT NULL,
  `tgl_panarikan` varchar(15) DEFAULT NULL,
  `time_penarikan` varchar(15) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `rekening_peminjam` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` varchar(15) NOT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `keperluan` text,
  `status` int(11) DEFAULT NULL,
  `rekening_bank` varchar(25) DEFAULT NULL,
  `tgl_pinjaman` varchar(15) DEFAULT NULL,
  `time_pinjaman` varchar(15) DEFAULT NULL,
  `jumlah_pinjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_dana_pinjaman`
--

CREATE TABLE IF NOT EXISTS `transfer_dana_pinjaman` (
  `id_transfer_dana_pinjaman` varchar(15) NOT NULL,
  `id_pinjaman` varchar(15) NOT NULL,
  `total_jumlah_transfer_dana` int(11) DEFAULT NULL,
  `tgl_transfer` varchar(15) DEFAULT NULL,
  `time_transfer` varchar(15) DEFAULT NULL,
  `from_rekening_bank` varchar(25) DEFAULT NULL,
  `to_rekening_bank` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `tahap_transfer_dana` varchar(10) DEFAULT NULL,
  `jumlah_tf_dana_bertahap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan_pinjaman`
--
ALTER TABLE `cicilan_pinjaman`
 ADD PRIMARY KEY (`id_cicilan_pinjaman`), ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `pemakaian_dana`
--
ALTER TABLE `pemakaian_dana`
 ADD PRIMARY KEY (`id_pemakaian_dana`), ADD KEY `id_pinjaman` (`id_pinjaman`), ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `penarikan_dana`
--
ALTER TABLE `penarikan_dana`
 ADD PRIMARY KEY (`id_penarikan_dana`), ADD KEY `id_pinjaman` (`id_pinjaman`), ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`id_pinjaman`), ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `transfer_dana_pinjaman`
--
ALTER TABLE `transfer_dana_pinjaman`
 ADD PRIMARY KEY (`id_transfer_dana_pinjaman`), ADD KEY `id_pinjaman` (`id_pinjaman`), ADD KEY `NIP` (`NIP`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cicilan_pinjaman`
--
ALTER TABLE `cicilan_pinjaman`
ADD CONSTRAINT `cicilan_pinjaman_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`);

--
-- Ketidakleluasaan untuk tabel `penarikan_dana`
--
ALTER TABLE `penarikan_dana`
ADD CONSTRAINT `penarikan_dana_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`),
ADD CONSTRAINT `penarikan_dana_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `karyawan` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `karyawan` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `transfer_dana_pinjaman`
--
ALTER TABLE `transfer_dana_pinjaman`
ADD CONSTRAINT `transfer_dana_pinjaman_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`),
ADD CONSTRAINT `transfer_dana_pinjaman_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `karyawan` (`NIP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
