-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_awaliasalmafarikhah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(150) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(100) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KTR-001', 'Aris Nugroho', 'IT Support', 22, '150000.00', 'Kontrak', 12, 'PT Mitra Solusi', NULL, NULL, NULL, NULL),
('KTR-002', 'Bima Sakti', 'Marketing', 20, '130000.00', 'Kontrak', 6, 'PT Bakat Nusantara', NULL, NULL, NULL, NULL),
('KTR-003', 'Chandra Kirana', 'Finance', 21, '140000.00', 'Kontrak', 12, 'PT Mitra Solusi', NULL, NULL, NULL, NULL),
('KTR-004', 'Deni Setiawan', 'HRD', 22, '135000.00', 'Kontrak', 6, 'PT Talent Utama', NULL, NULL, NULL, NULL),
('KTR-005', 'Eka Putri', 'Creative Design', 19, '145000.00', 'Kontrak', 24, 'PT Bakat Nusantara', NULL, NULL, NULL, NULL),
('KTR-006', 'Fajar Utama', 'IT Support', 23, '150000.00', 'Kontrak', 12, 'PT Mitra Solusi', NULL, NULL, NULL, NULL),
('KTR-007', 'Gita Gutawa', 'Finance', 20, '140000.00', 'Kontrak', 6, 'PT Talent Utama', NULL, NULL, NULL, NULL),
('MGN-001', 'Oki Setiawan', 'Mobile Developer', 20, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-01'),
('MGN-002', 'Putri Rahayu', 'UI/UX Designer', 22, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-02'),
('MGN-003', 'Rian Hidayat', 'Web Developer', 18, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1200000.00', 'CERT-KM-03'),
('MGN-004', 'Siti Aminah', 'Content Writer', 21, '70000.00', 'Magang', NULL, NULL, NULL, NULL, '1000000.00', 'CERT-KM-04'),
('MGN-005', 'Taufik Hidayat', 'Data Science', 22, '90000.00', 'Magang', NULL, NULL, NULL, NULL, '1800000.00', 'CERT-KM-05'),
('MGN-006', 'Utami Ningsih', 'UI/UX Designer', 19, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-06'),
('MGN-007', 'Viko Anderson', 'Web Developer', 20, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1200000.00', 'CERT-KM-07'),
('TTP-001', 'Hendra Wijaya', 'Software Engineer', 22, '250000.00', 'Tetap', NULL, NULL, '500000.00', 'SHM-001', NULL, NULL),
('TTP-002', 'Indah Permata', 'Product Manager', 21, '300000.00', 'Tetap', NULL, NULL, '750000.00', 'SHM-002', NULL, NULL),
('TTP-003', 'Joko Susilo', 'QA Engineer', 22, '200000.00', 'Tetap', NULL, NULL, '400000.00', 'SHM-003', NULL, NULL),
('TTP-004', 'Kartika Sari', 'Data Analyst', 20, '240000.00', 'Tetap', NULL, NULL, '500000.00', 'SHM-004', NULL, NULL),
('TTP-005', 'Lestari Dewi', 'Accountant', 22, '220000.00', 'Tetap', NULL, NULL, '450000.00', 'SHM-005', NULL, NULL),
('TTP-006', 'Muhammad Rizky', 'Software Engineer', 23, '250000.00', 'Tetap', NULL, NULL, '500000.00', 'SHM-006', NULL, NULL),
('TTP-007', 'Nadia Utami', 'HR Manager', 21, '280000.00', 'Tetap', NULL, NULL, '600000.00', 'SHM-007', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
