-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 07:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `role` enum('dosen','mahasiswa') DEFAULT NULL,
  `tgl_dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2340 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `username`, `nama`, `role`, `tgl_dihapus`) VALUES
(2, '118043', 'zafron', 'mahasiswa', '2021-06-15 01:31:54'),
(3, '118063', 'Dimas Bagaskara', 'mahasiswa', '2021-06-15 01:34:02'),
(4, '197512122003121001', 'Zhafron Adani KautSAR', 'dosen', '2021-06-15 01:34:02'),
(5, '197512122003121002', 'Fak Fajry', 'dosen', '2021-06-15 01:34:03'),
(6, '197512122003121003', NULL, 'dosen', '2021-06-15 01:34:03'),
(7, '197512122003121002', 'Fak Fajry', 'dosen', '2021-06-15 02:28:29'),
(8, '197512122003121002', 'Fak Fajry', 'dosen', '2021-06-15 02:28:29'),
(9, '118043', 'zafron', 'mahasiswa', '2021-06-15 07:12:59'),
(10, '118043', 'zafron', 'mahasiswa', '2021-06-15 07:12:59'),
(11, '118063', 'Dimas Bagaskara', 'mahasiswa', '2021-06-15 07:13:04'),
(12, '118063', NULL, 'mahasiswa', '2021-06-15 07:13:04'),
(13, '118043', 'zafron', 'mahasiswa', '2021-06-17 03:18:29'),
(14, '118043', NULL, 'mahasiswa', '2021-06-17 03:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(255) NOT NULL,
  `nama_dosen` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `role` enum('dosen','jurusan') NOT NULL,
  `id_dosen` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `alamat`, `telp`, `role`, `id_dosen`) VALUES
('197512122003121002', 'Abertun Sagit Sahay, ST., M.Eng.', 'tilung', '08125160369', 'dosen', 20),
('198207172003122002', 'Widiatry, ST., MT.,', 'tilung', '082256893408', 'dosen', 21),
('198106062005011001', 'Viktor Handrianus Pranatawijaya, ST., MT.', 'tilung', '081392201163', 'dosen', 22),
('196304231985021001', 'Drs.Jadiaman Parhusip, M.Kom.', 'tilung', '082154648703', 'dosen', 23),
('198910222015041001', 'Putu Bagus Adidyana Anugrah Putra, ST., M.Kom.', 'tilung', '081390080931', 'dosen', 24),
('199106302019031013', 'Efrans Christian, S.T.,M.T', 'tilung', '089691630102', 'dosen', 25),
('197606242005011015', 'Rony Teguh,S. Kom. MT., Ph.D.', 'tilung', '08125030919', 'dosen', 26),
('197505052008011032', 'Vincentius Abdi Gunawan,ST., MT', 'tilung', '081250885225', 'dosen', 27),
('197601182003122003', 'Felicia Sylviana,ST.MM. ', 'tilung', '08125151076 ', 'dosen', 28),
('198012262008121002 ', 'Deddy Ronaldo,ST., MT', 'tilung', '081347560199 ', 'dosen', 29),
('198110032006042001 ', 'Enny Dwi Oktaviyani, ST.,M.Kom.', 'tilung', '085235200553 ', 'dosen', 30),
('198109292006042001 ', 'Sherly Christina,S.Kom.,M.Kom. ', 'tilung', '085345244660 ', 'dosen', 31),
('198212062006042001 ', 'Devi Karolita, S. Kom., M.Kom.', 'tilung', '08125160369', 'dosen', 32),
('197910092008012016 ', 'Nahumi Nugrahaningsih, ST., MT.,Ph.D. ', 'tilung', '081348009181 ', 'dosen', 33),
('198003222005012004 ', 'Ariesta Lestari, S. Kom.,M.Cs., Ph.D', 'tilung', '08115542232 ', 'dosen', 34),
('198508182012121003 ', 'Agus Sehatman Saragih, ST., M.Eng. ', 'tilung', '082255500375 ', 'dosen', 35),
('198702032014041001 ', 'Ade Chandra Saputra, S.Kom., M.Cs.', 'tilung', '081299057613 ', 'dosen', 36),
('197605092008122001 ', 'Licantik,S.Kom.,M.Kom.', 'tilung', '081349191384 ', 'dosen', 37),
('198904072015042004 ', 'Nova Noor Kamala Sari, ST., M.Kom.', 'tilung', '085249185525 ', 'dosen', 38),
('199403012019032016 ', 'Ressa Priskila, S.T., M.T ', 'tilung', '085252465436 ', 'dosen', 39);

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `UpdateArsipDsn` AFTER DELETE ON `dosen` FOR EACH ROW BEGIN
  UPDATE arsip
  SET nama = OLD.nama_dosen
  WHERE username = OLD.nip;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pembimbing`
--

CREATE TABLE `dosen_pembimbing` (
  `id_dp` int(11) NOT NULL,
  `id_regis` int(11) DEFAULT NULL,
  `nim_mhs` varchar(255) DEFAULT NULL,
  `dosen_pembimbing1` varchar(225) DEFAULT '-',
  `dosen_pembimbing2` varchar(225) DEFAULT '-',
  `dpen1` varchar(255) DEFAULT '-',
  `dpen2` varchar(255) DEFAULT NULL,
  `dpen3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_pembimbing`
--

INSERT INTO `dosen_pembimbing` (`id_dp`, `id_regis`, `nim_mhs`, `dosen_pembimbing1`, `dosen_pembimbing2`, `dpen1`, `dpen2`, `dpen3`) VALUES
(22, 33, '118063', 'Viktor Handrianus Pranatawijaya, ST., MT.', 'Abertun Sagit Sahay, ST., M.Eng.', 'Widiatry, ST., MT.,', 'Abertun Sagit Sahay, ST., M.Eng.', 'Efrans Christian, S.T.,M.T'),
(24, 35, '118043', 'Drs.Jadiaman Parhusip, M.Kom.', 'Efrans Christian, S.T.,M.T', 'Vincentius Abdi Gunawan,ST., MT', 'Ressa Priskila, S.T., M.T ', 'Licantik,S.Kom.,M.Kom.');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `role` enum('mahasiswa') NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `NIM`, `Nama`, `role`) VALUES
(34, '118063', 'Dimas Bagaskara', 'mahasiswa'),
(36, '118043', ' Zafron', 'mahasiswa');

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `UpdateArsipMhs` AFTER DELETE ON `mahasiswa` FOR EACH ROW BEGIN
  UPDATE arsip
  SET nama = OLD.Nama
  WHERE username = OLD.NIM;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_berkas`
--

CREATE TABLE `nilai_berkas` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `srt_permohonan` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `ktm` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `transkip_nilai` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `slip_ukt` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `kartu_her` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `krs_terakhir` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `sk_p` enum('Proses','Setuju','Ditolak') DEFAULT NULL,
  `comen` longtext DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_berkas`
--

INSERT INTO `nilai_berkas` (`id`, `nim`, `srt_permohonan`, `ktm`, `transkip_nilai`, `slip_ukt`, `kartu_her`, `krs_terakhir`, `sk_p`, `comen`) VALUES
(2, '118043', 'Ditolak', 'Setuju', 'Setuju', 'Setuju', 'Ditolak', 'Ditolak', NULL, '<p>Laporqan tanpa revisi</p>\r\n'),
(3, '118063', 'Setuju', 'Ditolak', 'Setuju', 'Ditolak', NULL, NULL, NULL, NULL),
(4, '118063', 'Setuju', 'Ditolak', 'Setuju', 'Ditolak', NULL, NULL, NULL, NULL),
(5, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '118043', 'Ditolak', 'Setuju', 'Setuju', 'Setuju', 'Ditolak', 'Ditolak', NULL, NULL),
(11, '118043', 'Ditolak', 'Setuju', 'Setuju', 'Setuju', 'Ditolak', 'Ditolak', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `NIM` int(20) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Alamat` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `No_Telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nilai1` float NOT NULL DEFAULT 0,
  `nilai2` float NOT NULL DEFAULT 0,
  `nilai3` float NOT NULL DEFAULT 0,
  `nilai4` float NOT NULL DEFAULT 0,
  `nilai_hsl` float NOT NULL DEFAULT 0,
  `ket` varchar(255) NOT NULL DEFAULT '-',
  `id_dosen` int(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `nim`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai_hsl`, `ket`, `id_dosen`) VALUES
(11, '118063', 1.5, 0.6, 1.25, 0.5, 3.85, 'Baik', 0),
(12, '118043', 0, 0, 0, 0, 0, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL DEFAULT '',
  `judul` varchar(255) DEFAULT '-',
  `status` varchar(255) DEFAULT '-',
  `tanggal_regis` datetime NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `nim`, `judul`, `status`, `tanggal_regis`) VALUES
(33, '118063', 'Pendaftaran Skripsi', 'Proposal', '2021-06-15 07:15:41'),
(35, '118043', 'Aplikasi', 'Proposal', '2021-06-17 08:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `upload_berkas`
--

CREATE TABLE `upload_berkas` (
  `id_berkas` int(255) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `surat_permohonan` varchar(255) DEFAULT '-',
  `ktm` varchar(225) DEFAULT '-',
  `transkip_nilai` varchar(225) DEFAULT '-',
  `slip_ukt` varchar(255) DEFAULT '-',
  `kartu_herregis` varchar(255) DEFAULT '-',
  `krs_terakhir` varchar(225) DEFAULT '-',
  `proposal` varchar(225) DEFAULT '-',
  `sk_perpanjangan` varchar(255) DEFAULT '-',
  `berita_acara` varchar(255) DEFAULT '-',
  `jadwal` varchar(255) DEFAULT '-',
  `approve_dsn` varchar(225) DEFAULT '-'
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_berkas`
--

INSERT INTO `upload_berkas` (`id_berkas`, `nim`, `surat_permohonan`, `ktm`, `transkip_nilai`, `slip_ukt`, `kartu_herregis`, `krs_terakhir`, `proposal`, `sk_perpanjangan`, `berita_acara`, `jadwal`, `approve_dsn`) VALUES
(27, '118063', '1.pdf', '2.pdf', '3.pdf', '4.pdf', '-', '-', '296372609.pdf', '3.pdf', '21 April 2021.pdf', '4.pdf', '-'),
(34, '118043', '21 April 2021.pdf', 'DBC118053_Ipandri-Analisis.pdf', 'BUKU-METODE-PENELITIAN-PADA-BIDANG-IKOM-TI-ZAINAL-A-HASIBUAN1.pdf', '296372609.pdf', '370-943-1-SM.pdf', '76-1-258-1-10-20170512.pdf', '2.pdf', '-', '-', '-', '-');

--
-- Triggers `upload_berkas`
--
DELIMITER $$
CREATE TRIGGER `InsertNilaiBerkas` AFTER INSERT ON `upload_berkas` FOR EACH ROW BEGIN
  INSERT INTO nilai_berkas (nim)
    VALUES (NEW.nim);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `role` enum('admin','mahasiswa','dosen','jurusan') DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `pass`, `role`) VALUES
(5, 'admin', 'admin', 'admin'),
(36, '197512122003121002', '197512122003121002', 'dosen'),
(37, '198207172003122002', '198207172003122002', 'dosen'),
(38, '198106062005011001', '198106062005011001', 'dosen'),
(39, '196304231985021001', '196304231985021001', 'dosen'),
(40, '198910222015041001', '198910222015041001', 'dosen'),
(41, '199106302019031013', '199106302019031013', 'dosen'),
(42, '118063', '118063', 'mahasiswa'),
(43, 'prodi', 'prodi', 'jurusan'),
(45, '118043', '118043', 'mahasiswa'),
(46, '197606242005011015', '197606242005011015', 'dosen'),
(47, '197505052008011032', '197505052008011032', 'dosen'),
(48, '197601182003122003', '197601182003122003', 'dosen'),
(49, '198012262008121002 ', '198012262008121002 ', 'dosen'),
(50, '198110032006042001 ', '198110032006042001 ', 'dosen'),
(51, '198109292006042001 ', '198109292006042001 ', 'dosen'),
(52, '198212062006042001 ', '198212062006042001 ', 'dosen'),
(53, '197910092008012016 ', '197910092008012016 ', 'dosen'),
(54, '198003222005012004 ', '198003222005012004 ', 'dosen'),
(55, '198508182012121003 ', '198508182012121003 ', 'dosen'),
(56, '198702032014041001 ', '198702032014041001 ', 'dosen'),
(57, '197605092008122001 ', '197605092008122001 ', 'dosen'),
(58, '198904072015042004 ', '198904072015042004 ', 'dosen'),
(59, '199403012019032016 ', '199403012019032016 ', 'dosen');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `DeleteUserDsn` AFTER DELETE ON `user` FOR EACH ROW BEGIN
  INSERT INTO arsip (username, role, tgl_dihapus)
    VALUES (OLD.username, OLD.role, NOW());
  DELETE
    FROM dosen
  WHERE nip = old.username;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DeleteUserMhs` AFTER DELETE ON `user` FOR EACH ROW BEGIN
  INSERT INTO arsip (username, role, tgl_dihapus)
    VALUES (OLD.username, OLD.role, NOW());
  DELETE
    FROM mahasiswa
  WHERE NIM = old.username;
  DELETE
    FROM dosen_pembimbing
  WHERE nim_mhs = old.username;
  DELETE
    FROM proposal
  WHERE nim = old.username;
  DELETE
    FROM registrasi
  WHERE nim = old.username;
  DELETE
    FROM upload_berkas
  WHERE nim = old.username;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_berkas`
--
ALTER TABLE `nilai_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_berkas`
--
ALTER TABLE `upload_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nilai_berkas`
--
ALTER TABLE `nilai_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `upload_berkas`
--
ALTER TABLE `upload_berkas`
  MODIFY `id_berkas` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
