-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 22, 2018 at 01:55 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `absensiSiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_tanggal` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_tanggal`, `kelas`, `jurusan`, `tanggal`) VALUES
(7, 'X', 'TAV', '01/23/2018'),
(8, 'XII', 'TKJ 1', '01/23/2018');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_siswa` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_siswa`, `keterangan`, `tanggal`) VALUES
(1, 'hadir', '01/23/2018'),
(2, 'hadir', '01/23/2018'),
(5, 'hadir', '01/23/2018'),
(11, 'hadir', '01/23/2018'),
(17, 'izin', '01/23/2018'),
(18, 'izin', '01/23/2018'),
(19, 'izin', '01/23/2018'),
(20, 'izin', '01/23/2018'),
(21, 'hadir', '01/23/2018'),
(22, 'hadir', '01/23/2018'),
(23, 'hadir', '01/23/2018'),
(24, 'alpha', '01/23/2018'),
(28, 'alpha', '01/23/2018');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `kelas`, `jurusan`, `semester`) VALUES
(1, 17111066, 'A.Firwansyah', 'XII', 'TKJ 1', ''),
(2, 17111067, 'Indriani', 'XII', 'TKJ 1', ''),
(3, 18111068, 'Dono', 'XII', 'TKJ 2', ''),
(4, 12111012, 'Poncot', 'XII', 'TKJ 2', ''),
(5, 1237122, 'Bego', 'X', 'TAV', ''),
(6, 2112431, 'Susano', 'XI', 'NKPI', ''),
(7, 12372371, 'Ahmad', 'XII', 'TKJ 2', 'semester 1'),
(11, 12321421, 'Santoso', 'XII', 'TKJ 1', 'semester 1'),
(12, 17111008, 'Pranto Suwarno', 'XI', 'TKR 1', 'semester 1'),
(13, 17121016, 'Heri Agus Prasetio', 'X', 'AP 1', 'semester 1'),
(14, 1823910, 'Agus', 'X', 'Akutansi', 'semester 1'),
(15, 1232312, 'Prasetyo', 'X', 'Tata Niaga', 'semester 3'),
(16, 2424241, 'Human', 'X', 'Tata Busana', 'semester 3'),
(17, 1231232, 'Dono', 'X', 'TAV', 'semester 1'),
(18, 123213, 'Sama', 'XII', 'TKJ 1', 'semester 1'),
(19, 123232131, 'Susanoq', 'XII', 'TKJ 1', 'semester 1'),
(20, 3423423, 'Balala', 'XII', 'TKJ 1', 'semester 1'),
(21, 342141, 'balaass', 'XII', 'TKJ 1', 'semester 1'),
(22, 31231231, 'Jugo', 'XII', 'TKJ 1', 'semester 1'),
(23, 12321312, 'Sasuke', 'XII', 'TKJ 1', 'semester 1'),
(24, 123213123, 'Sakura', 'XII', 'TKJ 1', 'semester 1'),
(25, 1232312, 'Naruto', 'XI', 'TKR 1', 'semester 1'),
(26, 12321312, 'Kakashi', 'XI', 'TKR 1', 'semester 1'),
(27, 12323213, 'Jiraya', 'XI', 'TKR 1', 'semester 1'),
(28, 232312312, 'Nagato', 'X', 'TAV', 'semester 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_tanggal`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
