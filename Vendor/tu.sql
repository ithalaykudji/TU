-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 11:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_wisuda`
--

CREATE TABLE `data_wisuda` (
  `id_wisuda` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `noreg` int(11) NOT NULL,
  `kode_pt` varchar(50) NOT NULL DEFAULT '081018',
  `jenjang` varchar(5) NOT NULL DEFAULT 'S1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(3, 'FAKULTAS TEKNIK');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_baru`
--

CREATE TABLE `mahasiswa_baru` (
  `id_mhs` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `noreg` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(12) NOT NULL DEFAULT 'None',
  `ttl` varchar(45) NOT NULL,
  `tgl_masuk` varchar(35) NOT NULL,
  `asal_sklh` varchar(125) NOT NULL,
  `nilai_tes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_wisuda`
--

CREATE TABLE `mahasiswa_wisuda` (
  `id_mhs` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `noreg` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(12) NOT NULL DEFAULT 'None',
  `ttl` varchar(35) NOT NULL,
  `tgl_masuk` varchar(35) NOT NULL,
  `tgl_lulus` varchar(35) NOT NULL,
  `ipk` int(11) NOT NULL,
  `predikat_lulus` varchar(50) NOT NULL,
  `tahun_wisuda` varchar(35) NOT NULL,
  `wisuda_ke` int(11) NOT NULL,
  `lama_studi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(30) NOT NULL,
  `nama` int(100) NOT NULL,
  `nip` int(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `jabatan` varchar(1000) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `ttl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `prodi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `prodi`) VALUES
(11, 3, 'Teknik Sipil'),
(12, 3, 'Arsitektur'),
(13, 3, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `username` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT 'example@gmail.com',
  `password` varchar(75) NOT NULL,
  `id_active` int(2) NOT NULL DEFAULT 2,
  `id_role` int(2) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nip`, `username`, `email`, `password`, `id_active`, `id_role`) VALUES
(11, 12345, 'admin', 'example@gmail.com', '$2y$10$l8we/57WuvnP4WatrqSQHutOmVBUzadTMFDpCcIt0Rxzt9ikURmZq', 1, 1),
(12, 12346, 'operator', 'example@gmail.com', '$2y$10$oGp7moJpZJ2eSvpwBLNKWubS9Ub7/TAvG4Oyyr7CYXBozSfWGYEji', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_active`
--

CREATE TABLE `users_active` (
  `id_active` int(11) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_active`
--

INSERT INTO `users_active` (`id_active`, `status`) VALUES
(1, 'Active'),
(2, 'Not Active');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Employee'),
(3, 'Users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_wisuda`
--
ALTER TABLE `data_wisuda`
  ADD PRIMARY KEY (`id_wisuda`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `noreg` (`noreg`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `mahasiswa_wisuda`
--
ALTER TABLE `mahasiswa_wisuda`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `noreg` (`noreg`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_active` (`id_active`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `users_active`
--
ALTER TABLE `users_active`
  ADD PRIMARY KEY (`id_active`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_wisuda`
--
ALTER TABLE `data_wisuda`
  MODIFY `id_wisuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa_wisuda`
--
ALTER TABLE `mahasiswa_wisuda`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_active`
--
ALTER TABLE `users_active`
  MODIFY `id_active` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_wisuda`
--
ALTER TABLE `data_wisuda`
  ADD CONSTRAINT `data_wisuda_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  ADD CONSTRAINT `mahasiswa_baru_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mahasiswa_wisuda`
--
ALTER TABLE `mahasiswa_wisuda`
  ADD CONSTRAINT `mahasiswa_wisuda_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_active`) REFERENCES `users_active` (`id_active`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
