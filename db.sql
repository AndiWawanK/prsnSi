-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 01, 2018 at 06:25 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `absensiSiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `foto_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `pangkat`, `status`, `pendidikan`, `foto_profile`) VALUES
(19, '17111098', 'Muthmainnah', '01/23/2018', '', '-', 'HONORER', 'S1', 'quote3.png'),
(34, '17111066', 'A.Firwansyah', '11/13/1998', '', 'STAF', 'PNS', 'S1', 'IMG_0011.jpg'),
(36, '17111066', 'Sukma Intang', '01/23/2018', '', 'KAPRO', 'PNS', 'S1', 'people.png'),
(37, '17111077', 'Muthmainnah', '01/30/2018', '', '-', 'HONORER', 'S1', 'quote4.png'),
(44, '12345', 'Irfan', '01/24/2018', '', 'GURU BK', 'HONORER', 'S1', 'IMG_0011.jpg'),
(45, '1234', 'Sadariah', '01/31/2018', 'laki-laki', 'GURU BK', 'PNS', 'S1', 'quote3.png'),
(47, '1234567', 'Indriani', '11/13/1998', 'perempuan', '-', 'PNS', 'S1', 'people.png');

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
(16, 'X', 'TAV', '01/25/2018'),
(17, 'XI', 'TKR 1', '01/24/2018'),
(18, 'X', 'Akutansi', '01/24/2018'),
(19, 'XI', 'TKR 1', '01/29/2018'),
(20, 'XI', 'TKR 1', '01/29/2018'),
(21, 'XII', 'TKJ 1', '01/30/2018'),
(22, 'XII', 'TKJ 2', '01/30/2018');

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
(1, 'hadir', '01/30/2018'),
(2, 'izin', '01/30/2018'),
(3, 'hadir', '01/30/2018'),
(4, 'hadir', '01/30/2018'),
(7, 'hadir', '01/30/2018'),
(12, 'hadir', '01/29/2018'),
(18, 'alpha', '01/30/2018'),
(19, 'hadir', '01/30/2018'),
(20, 'hadir', '01/30/2018'),
(21, 'hadir', '01/30/2018'),
(22, 'hadir', '01/30/2018'),
(23, 'hadir', '01/30/2018'),
(24, 'hadir', '01/30/2018'),
(25, 'hadir', '01/29/2018'),
(26, 'hadir', '01/29/2018'),
(27, 'hadir', '01/29/2018');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(22, 'Matematika'),
(23, 'Bahasa Inggris'),
(24, 'Fisika'),
(25, 'Pendidikan Agama');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_guru`
--

CREATE TABLE `mapel_guru` (
  `id_guru` int(20) NOT NULL,
  `id_mapel` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel_guru`
--

INSERT INTO `mapel_guru` (`id_guru`, `id_mapel`) VALUES
(31, 23),
(31, 24),
(32, 23),
(32, 24),
(33, 25),
(34, 22),
(34, 24),
(35, 23),
(35, 25),
(36, 23),
(36, 24),
(37, 22),
(37, 25),
(38, 23),
(38, 24),
(39, 24),
(40, 22),
(41, 22),
(42, 22),
(43, 23),
(43, 25),
(44, 22),
(44, 23),
(44, 24),
(45, 22),
(45, 23),
(46, 24),
(46, 25),
(47, 24),
(47, 25);

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
(1, 17111066, 'A.Firwansyah', 'XII', 'TKJ 1', 'semester 1'),
(2, 17111067, 'Indriani', 'XII', 'TKJ 1', ''),
(3, 18111068, 'Dono', 'XII', 'TKJ 2', ''),
(4, 12111012, 'Poncot', 'XII', 'TKJ 2', ''),
(5, 1237122, 'Bego', 'X', 'TAV', ''),
(6, 2112431, 'Susano', 'XI', 'NKPI', ''),
(7, 12372371, 'Ahmad', 'XII', 'TKJ 2', 'semester 1'),
(11, 12321421, 'Santoso', 'X', 'TAV', 'semester 1'),
(12, 17111008, 'Pranto Suwarno', 'XI', 'TKR 1', 'semester 1'),
(13, 17121016, 'Heri Agus Prasetio', 'X', 'AP 1', 'semester 1'),
(14, 1823910, 'Agus', 'X', 'AP 1', 'semester 1'),
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
(28, 232312312, 'Nagato', 'X', 'TAV', 'semester 1'),
(29, 123214124, 'Supriadi', 'XII', 'Akutansi', 'semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('guru','admin') NOT NULL,
  `wali` varchar(10) NOT NULL,
  `foto_profile` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `password`, `level`, `wali`, `foto_profile`) VALUES
(1, 'Sukma Intang', '123456789', '123', 'guru', '', ''),
(3, 'A.Firwansyah', '17111066', '123', 'guru', 'Y', ''),
(4, 'administrator', 'admin', 'admin', 'admin', '', ''),
(20, 'Irfan', '12345', '01242018', 'guru', 'T', 'IMG_0011.jpg'),
(21, 'Sadariah', '1234', '01312018', 'guru', 'T', 'quote5.png'),
(23, 'Indriani', '1234567', '11131998', 'guru', 'T', 'frank-mckenna-140054.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `username` int(30) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`username`, `kelas`) VALUES
(2147483647, 'Tata Busana'),
(123213121, 'TKJ 1'),
(17111066, 'TKJ 1'),
(17111066, 'TKJ 2'),
(17111066, 'TKJ 2'),
(123456789, 'TKJ 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

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
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
