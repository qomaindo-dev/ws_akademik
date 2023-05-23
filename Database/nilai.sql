-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 11:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengolahan_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_tahun` int(10) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `izin` varchar(5) NOT NULL,
  `sakit` varchar(5) NOT NULL,
  `alfa` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `id_nilai` int(10) NOT NULL,
  `uh` float NOT NULL,
  `uts` float NOT NULL,
  `uas` float NOT NULL,
  `rata_rata` float NOT NULL,
  `grade` varchar(5) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `id_mapel`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl_lahir`, `status`, `no_tlp`, `photo`, `is_delete`) VALUES
('1', 'coba', 3, 'Laki-Laki', 'bogor', 'bogor', '2019-06-05', 'menikah', '28989819238', NULL, 0),
('12162083', 'Nisrina Nadhifa', 2, 'Perempuan', 'Bogor', 'Bogor', '1998-08-08', 'Single', '089101290197', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(50) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `mapel_id` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `jam` time(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nip`, `mapel_id`, `id_kelas`, `jam`) VALUES
('', '12162083', 2, 1, '13:05:00.00000');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_nilai`
--

CREATE TABLE `jenis_nilai` (
  `id_jenis` int(10) NOT NULL,
  `jenis_nilai` varchar(20) NOT NULL,
  `kode_nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_nilai`
--

INSERT INTO `jenis_nilai` (`id_jenis`, `jenis_nilai`, `kode_nilai`) VALUES
(2, 'Keterampilan', '3'),
(3, 'pengetahuan', '5');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_nilai`
--

CREATE TABLE `kategori_nilai` (
  `id_kategori` int(11) NOT NULL,
  `kategori_nilai` varchar(20) NOT NULL,
  `bobot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_nilai`
--

INSERT INTO `kategori_nilai` (`id_kategori`, `kategori_nilai`, `bobot`) VALUES
(1, 'Tugas', '20'),
(2, 'Pengetahian', '20');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `sakit` varchar(20) NOT NULL,
  `izin` varchar(20) NOT NULL,
  `alfa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jml_siswa` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jml_siswa`, `nip`, `is_delete`) VALUES
(1, 'VII A', 70, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(10) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL,
  `kkm` varchar(5) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `mata_pelajaran`, `kkm`, `is_delete`) VALUES
(2, 'IPA', '80', 0),
(3, 'Agama ', '90', 0),
(4, 'Sunda', '80', 0),
(5, 'PKN', '80', 0),
(6, 'Kimia', '75', 0);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `nis` int(11) NOT NULL,
  `nisn` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `nilai_siswa` float NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `role_id`, `nip`, `is_delete`) VALUES
(1, 'Nana', '202cb962ac59075b964b07152d234b70', 1, '12162083', 0),
(2, 'coba', '202cb962ac59075b964b07152d234b70', 3, '789', 0),
(7, 'guru', '77e69c137812518e359196bb2f5e9bb9', 2, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_petugas`
--

CREATE TABLE `role_petugas` (
  `id` int(11) NOT NULL,
  `kode_role` varchar(5) NOT NULL,
  `role` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_petugas`
--

INSERT INTO `role_petugas` (`id`, `kode_role`, `role`, `is_delete`) VALUES
(1, 'ADM', 'Admin', 0),
(2, 'GRU', 'Guru', 0),
(3, 'SW', 'Siswa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama_ayah` varchar(20) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_siswa`, `password`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `id_kelas`, `role_id`, `nama_ayah`, `pekerjaan`, `nama_ibu`, `no_tlp`, `alamat`, `photo`, `is_delete`) VALUES
('111', '222', 'cobaan', '202cb962ac59075b964b07152d234b70', 'bogor', '2019-05-29', 'Laki-laki', 'Islam', 3, 3, 'percobaan', 'pertama', 'kedua', '08281982983', 'coba', '1560594921323.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun` int(10) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun`, `tahun_ajaran`, `semester`) VALUES
(1, '2019', '1'),
(2, '2014', '2'),
(3, '2019/2020', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nip` (`nip`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role_petugas`
--
ALTER TABLE `role_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_petugas`
--
ALTER TABLE `role_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`NIS`),
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun`);

--
-- Constraints for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD CONSTRAINT `detail_nilai_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `mata_pelajaran` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_nilai` (`id_jenis`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_nilai` (`id_kategori`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role_petugas` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_petugas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
