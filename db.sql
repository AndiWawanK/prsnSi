-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 11, 2018 at 09:04 AM
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
(50, '17111066', 'A.Firwansyah', '02/09/2018', 'laki-laki', '-', 'PNS', 'S1', 'IMG_0011.jpg'),
(52, '17111068', 'Andi WawanK', '01/11/1998', 'Jenis Kelamin', '', '', '', ''),
(53, '17111068', 'Andi WawanK', '01/11/1998', 'laki-laki', 'STAFF', 'PNS', 'S1', 'avatar.png'),
(54, '', '', '', 'Jenis Kelamin', '', '', '', '');

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
(32, 'XII', 'TKJ 1', '02/11/2018'),
(33, 'XI', 'TKR 1', '02/11/2018'),
(34, 'X', 'TAV', '02/12/2018');

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
(2, 'izin', '02/11/2018'),
(5, 'hadir', '02/12/2018'),
(11, 'hadir', '02/12/2018'),
(12, 'hadir', '02/11/2018'),
(17, 'izin', '02/12/2018'),
(19, 'izin', '02/11/2018'),
(20, 'izin', '02/11/2018'),
(21, 'alpha', '02/11/2018'),
(22, 'izin', '02/11/2018'),
(23, 'hadir', '02/11/2018'),
(26, 'hadir', '02/11/2018'),
(28, 'izin', '02/12/2018');

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
(27, 'Bahasa Inggris'),
(28, 'Matematika'),
(29, 'Fisika'),
(30, 'TrobleShooting'),
(31, 'Mesin Mobil'),
(32, 'Dasdmskda'),
(33, 'Dasjndkjasn'),
(34, 'asdasda'),
(35, 'dasasdasd'),
(36, 'asdasda');

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
(47, 25),
(48, 23),
(48, 24),
(49, 23),
(49, 24),
(50, 27),
(50, 28),
(51, 27),
(51, 29),
(53, 27),
(53, 29);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `jenis_kelamin`, `alamat`, `tanggal_lahir`, `kelas`, `jurusan`, `semester`) VALUES
(1, 17111066, 'A.Firwansyah', 'Laki-Laki', 'Jl.Jembatan Merah', '13/11/1998', 'XI', 'TKJ 1', 'Semester:'),
(2, 17111067, 'Indriani', 'Perempuan', 'Tidak Diketahui', 'Tidak diKetahui', 'XII', 'TKJ 1', 'Semester:'),
(3, 18111068, 'Dono', 'Laki-Laki', 'Bonto Macinna', '12/11/1998', 'XII', 'TKJ 2', ''),
(5, 1237122, 'Bego', 'Perempuan', 'Sawere', '12/11/1998', 'X', 'TAV', ''),
(6, 2112431, 'Susano', '', '', '', 'XI', 'NKPI', ''),
(7, 12372371, 'Ahmad', 'Laki-Laki', 'Jl.Jalan Jalan', '02/16/2018', 'XI', 'TKJ 2', 'semester 1'),
(12, 17111008, 'Pranto Suwarno', '', '', '', 'XI', 'TKR 1', 'semester 1'),
(13, 17121016, 'Heri Agus Prasetio', '', '', '', 'X', 'AP 1', 'semester 1'),
(15, 1232312, 'Prasetyo', '', '', '', 'X', 'Tata Niaga', 'semester 3'),
(16, 2424241, 'Human', '', '', '', 'X', 'Tata Busana', 'semester 3'),
(19, 123232131, 'Susanoq', 'Laki-Laki', 'Jl.Teratai', '13/11/1998', 'XII', 'TKJ 1', 'semester 1'),
(20, 3423423, 'Balala', 'Laki-Laki', '', '', 'XII', 'TKJ 1', 'Semester:'),
(21, 342141, 'balaass', '', '', '', 'XII', 'TKJ 1', 'semester 1'),
(22, 31231231, 'Jugo', '', '', '', 'XII', 'TKJ 1', 'semester 1'),
(23, 12321312, 'Sasuke', '', '', '', 'XII', 'TKJ 1', 'semester 1'),
(26, 12321312, 'Kakashi', '', '', '', 'XI', 'TKR 1', 'semester 1'),
(29, 123214124, 'Supriadi', '', '', '', 'XII', 'Akutansi', 'semester 1'),
(30, 1234567, 'Semabrang', 'Laki-Laki', 'Jl.Semabrang', '01/11/1998', 'XI', 'TKR 2', 'semester 1');

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
(23, 'Indriani', '1234567', '11131998', 'guru', 'T', 'frank-mckenna-140054.jpg'),
(24, 'Kopi', '123456', '02022018', 'guru', 'Y', 'quote2.png'),
(25, 'A.Firwansyah', '123213412', '123', 'guru', 'Y', 'IMG_0011.jpg'),
(26, 'A.Firwansyah', '17111066', '02092018', 'guru', 'Y', 'IMG_0011.jpg'),
(27, 'Andi WawanK', '17111068', '01111998', 'guru', 'Y', 'avatar.png'),
(28, 'Andi WawanK', '17111068', '01111998', 'guru', 'T', ''),
(29, 'Andi WawanK', '17111068', 'wawank1234', 'guru', 'T', 'avatar.png'),
(30, '', '', '', 'guru', 'T', '');

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
(123456789, 'TKJ 1'),
(123456, 'TKJ 2'),
(123213412, 'TKJ 1'),
(17111066, 'TKJ 1'),
(17111068, 'TKJ 2');

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
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
