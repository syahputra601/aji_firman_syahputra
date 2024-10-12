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
-- Database: `aji_firman_syahputra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `ID_BUKU` varchar(5) NOT NULL DEFAULT '',
  `JUDUL` varchar(100) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `PENGARANG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`ID_BUKU`, `JUDUL`, `ISBN`, `PENGARANG`) VALUES
('B001', 'IPHONE FOR DUMMIES', '1111111', 'WILLEY'),
('B002', 'PEMOGRAMAN BAHASA JAWA', '2222222', 'ROY MARTEN'),
('B003', 'PHP FOR DUMMIES', '3333333', 'WILLEY'),
('B004', 'PENGOLAHAN DATABASE DENGAN ORACLE', '4444444', 'HENDRA'),
('B005', 'INTERFACING WITH C', '5555555', 'SCADA'),
('B006', 'CLOUD COMPUTING FUNDAMENTAL', '6666666', 'WILLEY'),
('B007', 'PANDUAN FORENSIK FOTO DIGITAL', '7777777', 'ROY MARTEN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_peminjaman_buku` (
  `ID_PEMINJAMAN_BUKU` varchar(5) NOT NULL DEFAULT '',
  `PINJAM` varchar(15) DEFAULT NULL,
  `BATAS` varchar(15) DEFAULT NULL,
  `KEMBALI` varchar(15) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `NIS` varchar(5) DEFAULT NULL,
  `ID_BUKU` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peminjaman_buku`
--

INSERT INTO `tbl_peminjaman_buku` (`ID_PEMINJAMAN_BUKU`, `PINJAM`, `BATAS`, `KEMBALI`, `STATUS`, `NIS`, `ID_BUKU`) VALUES
('P001', '01/11/2010', '08/11/2010', NULL, 0, '006', 'B007'),
('P002', '01/11/2010', '08/11/2010', '05/11/2010', 1, '006', 'B005'),
('P003', '01/11/2010', '08/11/2010', NULL, 0, '004', 'B002'),
('P004', '06/11/2010', '13/11/2010', '08/11/2010', 1, '003', 'B003'),
('P005', '06/11/2010', '13/11/2010', NULL, 0, '007', 'B006'),
('P006', '09/11/2010', '16/11/2010', NULL, 0, '001', 'B001'),
('P007', '05/11/2010', '16/11/2010', NULL, 0, '001', 'B004'),
('P011', '10/01/2010', '17/01/2010', '15/01/2010', 1, '006', 'B006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE IF NOT EXISTS `tbl_pinjam` (
  `ID_PINJAM` varchar(5) NOT NULL DEFAULT '',
  `TGL_PINJAM` varchar(15) DEFAULT NULL,
  `TGL_BATAS` varchar(15) DEFAULT NULL,
  `TGL_KEMBALI` varchar(15) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `NIK` varchar(5) DEFAULT NULL,
  `ID_BUKU` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`ID_PINJAM`, `TGL_PINJAM`, `TGL_BATAS`, `TGL_KEMBALI`, `STATUS`, `NIK`, `ID_BUKU`) VALUES
('P001', '01/11/2010', '08/11/2010', NULL, 0, '006', 'B007'),
('P002', '01/11/2010', '08/11/2010', '05/11/2010', 1, '006', 'B005'),
('P003', '01/11/2010', '08/11/2010', NULL, 0, '004', 'B002'),
('P004', '06/11/2010', '13/11/2010', '08/11/2010', 1, '003', 'B003'),
('P005', '06/11/2010', '13/11/2010', NULL, 0, '007', 'B006'),
('P006', '09/11/2010', '16/11/2010', NULL, 0, '001', 'B001'),
('P007', '09/11/2010', '16/11/2010', NULL, 0, '001', 'B004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `NIS` varchar(5) NOT NULL DEFAULT '',
  `NAMA` varchar(100) DEFAULT NULL,
  `TGL_LAHIR` varchar(15) DEFAULT NULL,
  `KELAMIN` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`NIS`, `NAMA`, `TGL_LAHIR`, `KELAMIN`) VALUES
('001', 'ARIF ABDULRAHMAN', '12/03/1987', 'L'),
('002', 'ASRI WELAS', '03/10/1979', 'P'),
('003', 'RASMI RAHMAWATI', '05/07/1985', 'P'),
('004', 'UNDINR. KAMAL', '27/05/1984', 'L'),
('005', 'ARDIYANSAH SAPUTRA', '30/01/1981', 'L'),
('006', 'SEPTIINA HERMAWAN', '17/09/1983', 'P'),
('007', 'HERMAN BARLIN', '09/04/1980', 'L'),
('12312', 'Firman succeed', '05/12/1987', 'L'),
('P0011', 'Gina', '01/01/1970', 'L'),
('P008', 'Aji', '01/11/1990', 'L'),
('P0082', 'Gina', '01/01/1970', 'L'),
('P009', 'FIRMAN', '21/12/1991', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
 ADD PRIMARY KEY (`ID_BUKU`);

--
-- Indexes for table `tbl_peminjaman_buku`
--
ALTER TABLE `tbl_peminjaman_buku`
 ADD PRIMARY KEY (`ID_PEMINJAMAN_BUKU`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
 ADD PRIMARY KEY (`ID_PINJAM`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
 ADD PRIMARY KEY (`NIS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
