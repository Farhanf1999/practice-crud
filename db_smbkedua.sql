-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 01:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smbkedua`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(20) NOT NULL,
  `tb_iduser` varchar(20) NOT NULL,
  `tb_nama` varchar(40) NOT NULL,
  `tb_ttl` date NOT NULL,
  `tb_jeniskelamin` varchar(200) NOT NULL,
  `tb_alamat` varchar(100) NOT NULL,
  `tb_jurusan` varchar(40) NOT NULL,
  `tb_email` varchar(40) NOT NULL,
  `tb_nohp` int(40) NOT NULL,
  `tb_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `tb_iduser`, `tb_nama`, `tb_ttl`, `tb_jeniskelamin`, `tb_alamat`, `tb_jurusan`, `tb_email`, `tb_nohp`, `tb_status`) VALUES
(0, 'admin1', '', '0000-00-00', '', '', '', '', 0, 'Menunggu Pendaftaran'),
(0, 'admin2', '', '0000-00-00', '', '', '', '', 0, 'Menunggu Pendaftaran'),
(0, 'admin3', '', '0000-00-00', '', '', '', '', 0, 'Menunggu Pendaftaran'),
(0, 'farhan', 'Farhan F', '2021-08-12', 'Laki-laki', 'Bandung', 'TK', 'ff@gmail.com', 1212321, 'Telah di ACC'),
(0, 'nadena', 'nade na', '2021-08-27', 'Perempuan', 'Bandung', 'TK', 'nadena@gmail.com', 2147483647, 'Telah di ACC'),
(0, 'rik', '', '0000-00-00', '', '', '', '', 0, 'Menunggu Pendaftaran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id` int(20) NOT NULL,
  `tb_iduser` varchar(100) NOT NULL,
  `tb_password` varchar(20) NOT NULL,
  `tb_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id`, `tb_iduser`, `tb_password`, `tb_akses`) VALUES
(0, 'admin1', 'admin1', 'admin'),
(0, 'admin2', 'admin2', 'admin'),
(0, 'admin3', 'admin3', 'admin'),
(0, 'farhan', 'farhan', ''),
(0, 'nadena', 'nadena', ''),
(0, 'rik', 'rik', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`tb_iduser`);

--
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`tb_iduser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD CONSTRAINT `FK_data` FOREIGN KEY (`tb_iduser`) REFERENCES `tb_registrasi` (`tb_iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_iduser` FOREIGN KEY (`tb_iduser`) REFERENCES `tb_registrasi` (`tb_iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
