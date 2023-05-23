-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 03:19 PM
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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
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
('1213452699', 'Abd Muklis Miftakhud', 2, 'Laki-Laki', 'Jl. Mekah No.40', 'Sukabumi', '1990-07-25', 'Single', '09876544', '1563700013644.png', 1),
('12161653', 'Siti Soilkhah', 8, 'Perempuan', 'Cibinong', 'Jawa', '1998-08-18', 'Single', '09879869698', '1564200698104.jpg', 0),
('19900111201008158', 'Jefri  Nichol', 11, 'Laki-Laki', 'Jakarta ', 'Jakarta', '1990-01-11', 'Menikah', '078789088907', '1564185830347.png', 0),
('1990611201806140', 'Muhammad Reza', 12, 'Laki-Laki', 'Jl. Kamboja No. 80', 'Jawa Tenga', '1999-06-11', 'Menikah', '09898798980', '1564189128744.png', 0),
('19970125201605234', 'Indah Puji Lestari', 8, 'Perempuan', 'Perumahan Bumi Perti', 'Ciamis', '1997-01-25', 'Menikah', '088987654790', '1564191105700.png', 0),
('19970624201606167', 'Ahmad Maulana', 4, 'Laki-Laki', 'Jl. Mekah No.40', 'Sukabumi', '1990-07-25', 'Single', '09876544', '1564186723669.png', 0),
('19970918201807190', 'Rama', 3, 'Laki-Laki', 'Jl. Merdeka', 'bandung', '1990-03-01', 'Menikah', '087897979152817', '1563339187727.jpg', 0),
('19971109201606260', 'Hildayah Shintia', 5, 'Perempuan', 'Jl. Kedung Badak', 'Bogor', '1990-10-19', 'Single', '098769879709', '1564189471797.png', 0),
('19980430201808290', 'Maharani Fajriah ', 10, 'Perempuan', 'Jl.Cilebut', 'Bogor', '1998-04-30', 'Single', '09897658780', '1563337678416.jpeg', 0),
('19980724201707230', 'Uning Widiastuti', 7, 'Perempuan', 'Jl. Cimanggu Wates ', 'bandung', '1990-04-12', 'Single', '0898909876', '1564189286208.png', 0),
('19980808201808280', 'Nisrina Nadhifah ', 2, 'Perempuan', 'Bogor', 'Bogor', '1998-08-08', 'Single', '089101290197', '1564189162712.png', 0),
('19980914201897234', 'Rista Restianawati', 9, 'Perempuan', 'Jl. Sukasari', 'Bogor', '1998-09-14', 'Menikah', '088797656457', '1564190471546.png', 0),
('19981218201804107', 'Muhammad Ridwan', 13, 'Laki-Laki', 'Jl. Pulo No. 20', 'Bogor', '1998-12-18', 'Menikah', '08907890678', '1564190728701.png', 0),
('5050505', 'Rama', 3, 'Laki-Laki', 'Jl. Pacilong', 'Bogor', '1990-03-13', 'Menikah', '08090980980', '1563339077315.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(50) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mapel`, `id_kelas`, `nip`, `hari`, `jam`) VALUES
(6, 8, 1, '19970125201605234', 'Rabu', '7-8'),
(7, 10, 1, '19980430201808290', 'Selasa', '9-10'),
(8, 7, 1, '19971109201606260', 'senin', '10-11'),
(9, 5, 6, '1990611201806140', 'Jumat', '10-11'),
(10, 2, 8, '19980808201808280', 'Senin', '11-12'),
(11, 13, 2, '19900111201008158', 'Kamis', '10-11'),
(12, 13, 7, '19900111201008158', 'Senin', '8-9'),
(13, 4, 1, '19970624201606167', 'Selasa', '8-9');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jml_siswa` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jml_siswa`, `is_delete`) VALUES
(1, '7 A', 15, 0),
(2, '8 B', 15, 0),
(3, '7 B', 15, 0),
(4, '7 C', 15, 0),
(5, '8 A', 15, 0),
(6, '8 C', 15, 0),
(7, '9 A', 15, 0),
(8, '9 B', 15, 0),
(9, '9 C', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(10) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `kkm` varchar(5) NOT NULL,
  `kelompok` enum('A','B') NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `mata_pelajaran`, `kkm`, `kelompok`, `is_delete`) VALUES
(2, 'Ilmu Pengetahuan Alam', '70', 'A', 0),
(3, 'Pendidikan Agama Islam dan  Budi Pekerti', '75', 'A', 0),
(4, 'Sunda', '80', 'A', 0),
(5, 'Pendidikan Pancasila dan Kewarganegaraan', '70', 'A', 0),
(7, 'Matematika', '75', 'A', 0),
(8, 'Bahasa Indonesia', '75', 'A', 0),
(9, 'Ilmu Pengetahuan Sosial', '75', 'A', 0),
(10, 'Bahasa Inggris', '75', 'A', 0),
(11, 'Seni Budaya ', '70', 'B', 0),
(12, 'Pendidikan Jasmani,Olah Raga dan Kesehatan', '70', 'B', 0),
(13, 'Prakarya', '75', 'B', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `uh1` int(11) NOT NULL,
  `uh2` int(11) NOT NULL,
  `uh3` int(11) NOT NULL,
  `uh4` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `hasil` int(11) NOT NULL,
  `grade` enum('A','B','C','D','E') NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `id_mapel`, `semester`, `uh1`, `uh2`, `uh3`, `uh4`, `uts`, `uas`, `hasil`, `grade`, `is_delete`) VALUES
(17, '111', 2, '1', 75, 75, 75, 75, 80, 90, 82, 'B', 0),
(18, '12162083', 2, '1', 87, 87, 87, 87, 67, 50, 68, 'D', 0),
(19, '12162083', 11, '1', 90, 88, 87, 67, 65, 90, 78, 'B', 0),
(21, '111', 2, '1', 84, 84, 84, 84, 90, 89, 88, 'B', 0),
(22, '16071101', 2, '1', 81, 81, 81, 81, 98, 78, 86, 'B', 0),
(23, '16071102', 2, '1', 85, 85, 85, 85, 95, 90, 90, 'E', 0),
(24, '16071103', 2, '1', 82, 82, 82, 82, 88, 95, 88, 'B', 0),
(25, '16071104', 2, '1', 81, 81, 81, 81, 89, 78, 83, 'B', 0),
(26, '16071105', 2, '1', 76, 76, 76, 76, 85, 90, 84, 'B', 0),
(27, '16071106', 2, '1', 82, 82, 82, 82, 88, 78, 83, 'B', 0),
(28, '111', 13, '1', 83, 83, 83, 83, 90, 80, 84, 'B', 0),
(29, '16071101', 13, '1', 81, 81, 81, 81, 96, 86, 88, 'B', 0),
(30, '16071102', 13, '1', 83, 83, 83, 83, 96, 85, 88, 'B', 0),
(31, '16071103', 13, '1', 84, 84, 84, 84, 96, 84, 88, 'B', 0),
(32, '16071104', 13, '1', 84, 84, 84, 84, 95, 85, 88, 'B', 0),
(33, '16071105', 13, '1', 82, 82, 82, 82, 90, 80, 84, 'B', 0),
(34, '16071106', 13, '1', 80, 80, 80, 80, 90, 88, 86, 'B', 0),
(35, '111', 5, '1', 90, 90, 90, 90, 97, 90, 92, 'A', 0),
(36, '16071101', 5, '1', 83, 83, 83, 83, 98, 88, 90, 'E', 0),
(37, '16071102', 5, '1', 75, 75, 75, 75, 78, 90, 81, 'B', 0),
(38, '16071103', 5, '1', 88, 88, 88, 88, 89, 78, 85, 'B', 0),
(39, '16071104', 5, '1', 84, 84, 84, 84, 70, 70, 75, 'C', 0),
(40, '16071105', 5, '1', 81, 81, 81, 81, 89, 98, 89, 'E', 0),
(41, '16071106', 5, '1', 83, 83, 83, 83, 90, 76, 83, 'B', 0),
(42, '111', 7, '1', 84, 84, 84, 84, 86, 90, 87, 'B', 0),
(43, '16071101', 7, '1', 86, 86, 86, 86, 83, 86, 85, 'B', 0),
(44, '16071102', 7, '1', 76, 76, 76, 76, 83, 80, 80, 'E', 0),
(45, '16071103', 7, '1', 87, 87, 87, 87, 65, 56, 69, 'E', 0),
(46, '16071104', 7, '1', 68, 68, 68, 68, 89, 90, 82, 'B', 0),
(47, '16071105', 7, '1', 79, 79, 79, 79, 90, 56, 75, 'C', 0),
(48, '16071106', 7, '1', 81, 81, 81, 81, 57, 0, 46, 'E', 0),
(49, '111', 2, '1', 88, 88, 88, 88, 90, 80, 86, 'B', 0),
(50, '16071101', 2, '1', 85, 85, 85, 85, 77, 89, 84, 'B', 0),
(51, '16071102', 2, '1', 64, 64, 64, 64, 65, 78, 69, 'E', 0),
(52, '16071103', 2, '1', 81, 81, 81, 81, 56, 85, 74, 'C', 0),
(53, '16071104', 2, '1', 53, 53, 53, 53, 67, 90, 70, 'C', 0),
(54, '16071105', 2, '1', 58, 58, 58, 58, 45, 60, 54, 'E', 0),
(55, '16071106', 2, '1', 66, 66, 66, 66, 87, 78, 77, 'C', 0),
(61, '15071601', 2, '2', 50, 60, 70, 80, 90, 100, 85, 'B', 0),
(62, '14071401', 7, '1', 90, 90, 67, 89, 90, 76, 83, 'B', 0),
(63, '14071402', 7, '1', 67, 66, 90, 76, 56, 78, 70, 'E', 0),
(64, '14071403', 7, '1', 90, 78, 90, 88, 89, 85, 87, 'B', 0),
(65, '14071404', 7, '1', 56, 78, 90, 98, 96, 78, 85, 'B', 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `role_id`, `nip`, `is_delete`) VALUES
(8, 'admin', '202cb962ac59075b964b07152d234b70', 1, '12161653', 0),
(9, 'Adjie', '202cb962ac59075b964b07152d234b70', 2, '1213452699', 0),
(13, 'Nisrina', '202cb962ac59075b964b07152d234b70', 2, '19980808201808280', 0),
(14, 'Ridwan', '202cb962ac59075b964b07152d234b70', 2, '19981218201804107', 0),
(15, 'Rista', '202cb962ac59075b964b07152d234b70', 2, '19980914201897234', 0),
(16, 'Hilda', '202cb962ac59075b964b07152d234b70', 2, '19971109201606260', 0),
(18, 'Jefri', '202cb962ac59075b964b07152d234b70', 2, '19900111201008158', 0),
(19, 'Rani', '202cb962ac59075b964b07152d234b70', 2, '19980430201808290', 0),
(20, 'Reza', '202cb962ac59075b964b07152d234b70', 2, '1990611201806140', 0),
(21, 'rama', '202cb962ac59075b964b07152d234b70', 2, '19970918201807190', 0),
(22, 'Uning', '202cb962ac59075b964b07152d234b70', 2, '19980724201707230', 0);

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
  `nama_siswa` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_siswa`, `password`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `id_kelas`, `tahun_ajaran`, `role_id`, `nama_ayah`, `pekerjaan`, `nama_ibu`, `no_tlp`, `alamat`, `photo`, `is_delete`) VALUES
('111', '222', 'cobaan', '202cb962ac59075b964b07152d234b70', 'bogor', '2019-05-29', 'Laki-laki', 'Islam', 1, '2019-2020', 3, 'percobaan', 'pertama', 'kedua', '08889890', 'coba', '1560594921323.jpg', 0),
('12162083', '12165771', 'Nisrina Nadhifa', '202cb962ac59075b964b07152d234b70', 'Bogor', '1998-08-08', 'Perempuan', 'Islam', 2, '', 3, 'Sutisna', 'Bekerja', 'Ibu', '08221929121', 'Bondes Bogor', '1563269265051.png', 0),
('14071401', '20019897650', 'Ina Sarifah', '9cec24963930eab727c677d0a8842da7', 'Bogor', '2002-02-02', 'Perempuan', 'Islam', 7, '2014-2015', 3, 'Agung', 'Karyawan', 'Hutami', '0897654890', 'Jl. Ciampea', '1564476589460.png', 0),
('14071402', '20009879078', 'Nurul Huda', '3c4dcc55f377d370f10db939f011989b', 'Bamdung', '2002-07-31', 'Perempuan', 'Islam', 7, '2014-2015', 3, 'Zulkifli', 'Pegawai Negeri Sipil', 'Meilinda', '0897808796587', 'Jl. Ciomas ', '1564476703848.png', 0),
('14071403', '2000987900', 'Kiki Candra', '22746e3e143460e54440a4b5a03e5bc1', 'Bekasi', '2002-04-05', 'Laki-laki', 'Islam', 7, '2014-2015', 3, 'Abdul', 'Karyawan', 'Diah', '08907890678', 'Jl, Kebon Pedes', '1564477086380.png', 0),
('14071404', '20098798790', 'Uning Widiastuti', '7614a8bc1b6c6579d7ddee76409d3a89', 'Bogor', '2002-07-24', 'Perempuan', 'Islam', 7, '2014-2015', 3, 'Fathur', 'PNS', 'aminah', '08987687879', 'Jln. Abdulooh', '1564476942355.png', 0),
('15071601', '200807890098', 'Ratna Asih', 'cfd35a78f42eb07a81290ee8df2ad844', 'Bogor', '2003-03-06', 'Perempuan', 'Kristen', 3, '2015-2016', 3, 'Angga Hermawan', 'Buruh', 'Sisak', '088786564890', 'Jln. Ahmad Yani', '1564457071152.png', 0),
('15071602', '200807890090', 'Rangga Purnama', '5c6238d62ff22cf1540a586d8d4dced6', 'Bandung', '2003-07-03', 'Laki-laki', 'Islam', 2, '2015-2016', 3, 'Kakang', 'karyawan swasta', 'Risa', '08987678909', 'Jl. Cempaka', '1564457251391.png', 0),
('15071603', '20009879078', 'Noviliani', '22746e3e143460e54440a4b5a03e5bc1', 'Bogor', '2002-04-05', 'Perempuan', 'Islam', 2, '2015-2016', 3, 'Kai', 'Pedagang', 'Minah', '089078906789', 'Jln. Suka maju', '1564475404610.png', 0),
('15071604', '20009879090', 'Sri Ayu Lestari', 'c6da7a0eddc55b3107d7a0ac9371ac4d', 'brebes', '2004-06-22', 'Perempuan', 'Islam', 2, '2015-2016', 3, 'Ahmad', 'Buruh Tani', 'Ajeng', '08976545689', 'Jln, Makmur Jaya ', '1564475557107.jpg', 0),
('15071605', '20009879046', 'Adelia Mulyani', '7e86e3c640d8bc7d6f95e6a5f3cb82fe', 'Surabaya', '2002-03-02', 'Perempuan', 'Islam', 2, '2015-2016', 3, 'Fauzi', 'Karyawan', 'Siti', '08876789098', 'Jl, Anggrek', '1564476044858.png', 0),
('16071101', '20160040125', 'Indah Puji Lestari', '4835ce8099d6ddc2b0e243c0093b1dab', 'Ciamis', '2004-01-25', 'Perempuan', 'Islam', 1, '2016-2017', 3, 'Sholihin', 'Kepala Sekolah', 'Ida', '089878675664', 'Jl. Bumi Pertiwi', '1564201154348.png', 0),
('16071102', '20160050164', 'Muhammad Ridwan', '608df2a1189de529b018f2b324096a01', 'Bogor', '2004-12-18', 'Laki-laki', 'Islam', 1, '2016-2017', 3, 'Udin', 'Buruh', 'Anih', '098976469800', 'Jl. Pulo', '1564201301626.png', 0),
('16071103', '20160040225', 'Muhammad Reza', 'ace736a1a62935fd82569ad39983b930', 'Bandung', '2004-06-09', 'Laki-laki', 'Islam', 1, '2016-2017', 3, 'Suratman', 'karyawan swasta', 'Markonah', '08976879897678', 'Jl. Hj Otong', '1564201446007.png', 0),
('16071104', '20160040890', 'Uning Widiastuti', '67f27ef6eaec465f8b86f40082019c49', 'Bogor', '2004-06-24', 'Perempuan', 'Islam', 1, '2016-2017', 3, 'Ucup', 'karyawan swasta', 'Desy', '08826509089', 'Jl. Cimanggu Wates', '1564201560434.png', 0),
('16071105', '20160040490', 'Adelia Mulyani', '32131fa06c57505235f45c9f444d60de', 'Nanggung', '2004-05-06', 'Perempuan', 'Islam', 1, '2016-2017', 3, 'Bahrun', 'Buruh', 'Siti', '089678234678', 'Jl. Kukupu ', '1564201659011.png', 0),
('16071106', '20160040987', 'Rama Ramdahan', 'becb2a3efda11da46e3b86386189ea03', 'Sukabumi', '2004-03-18', 'Laki-laki', 'Islam', 1, '2016-2017', 3, 'Helcy', 'karyawan swasta', 'Sindi', '09879866989', 'Jl. Kelinci No.5', '1564201769180.png', 0),
('Analisa', '200046759827', 'Nisrina Nadhifah', '35dc201ae8e65f83d69a5d9fc85e37f8', 'Bandung ', '2019-07-16', 'Perempuan', 'Islam', 1, '2019-2021', 3, 'Abdul', 'Karyawan', 'Muzdalifah', '089798989098', 'Jl. Amanah', '1564490863442.png', 1);

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `mapel_id` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nis` (`nis`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role_petugas`
--
ALTER TABLE `role_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`);

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
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role_petugas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
