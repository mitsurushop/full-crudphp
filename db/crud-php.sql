-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 09:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'salsabilaa', 'bilaaa1', 'husnialif06@gmail.com', '$2y$10$mB.JtnNILnceEOamBtMOZOkkIWaY/EjLXDY3iWnvRZWan92tqMUnG', '1'),
(3, 'reyhaann', 'reeyy', 'reyhanabyakta@gmail.com', '$2y$10$vHga2CWMuUGme4uah0ODxu4KqI2vGdnxHxtIsO1JAc.QXqNQPrOaq', '1'),
(4, 'Operator Mahasiswa', 'opmahasiswa', 'opmahasiswa@gmail.com', '$2y$10$7FW8.y83Dv7jTysiRi7uXuXMN2cFrxVuJNaAfFmBns9weEWbRA7VK', '3'),
(5, 'Operator Barang', 'opbarang', 'opbarang@gmail.com', '$2y$10$28FKeNcLh7mnnopKZ6rgtuoCHi68eIbLe2dFyKdW5ZFPOPOAaa9q.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(25, 'Komputer', '3', '5000000', '141574', '2024-08-29 11:23:55'),
(26, 'Laptop', '6', '5500000', '513663', '2024-08-29 11:24:41'),
(27, 'Headset', '10', '30000', '139671', '2024-08-29 15:31:01'),
(28, 'Meja', '5', '500000', '665073', '2024-08-29 15:31:24'),
(29, 'Mouse', '7', '45000', '222278', '2024-08-29 15:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(1, 'reyhan', 'Teknik Informatika', 'Laki-Laki', '0858555555', '<p><em>Krian, Sidoarjo</em></p>', 'reyhanabyakta@gmail.com', '66d06a6edb040.jpeg'),
(2, 'salsabila', 'Teknik Informatika', 'Perempuan', '0858568888', '<p><em>Balongbendo, Sidoarjo</em></p>\r\n', 'husnialif06@gmail.com', '66d075521f62b.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
