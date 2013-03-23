-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2013 at 07:45 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `no` int(11) NOT NULL,
  `id_siswa` varchar(8) NOT NULL,
  `kd_kelas` varchar(4) NOT NULL,
  `tgl` date NOT NULL,
  `hadir` int(4) NOT NULL,
  `jml_sakit` int(4) NOT NULL,
  `jml_izin` int(4) NOT NULL,
  `jml_alpa` int(4) NOT NULL,
  `th_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id_siswa` (`id_siswa`),
  KEY `kd_kelas` (`kd_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `no` int(11) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `id_admin`, `password`) VALUES
(1, '10650011', '1adbcbeef010a1b3a2b06d99187435fa');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` varchar(20) NOT NULL,
  `nm_guru` varchar(40) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nm_guru`, `jk`, `agama`, `tempat_lahir`, `tgl_lahir`, `password`, `alamat`, `status`, `keterangan`) VALUES
('12', 'r', 'p', 'islam', 'h', '2013-03-04', 'c20ad4d76fe97759aa27a0c99bff6710', 'g', 'd', 't');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `no` int(4) NOT NULL,
  `id_siswa` varchar(8) NOT NULL,
  `kd_mapel` varchar(3) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `id_guru` varchar(20) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id_siswa` (`id_siswa`),
  KEY `kd_mapel` (`kd_mapel`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kd_kelas` varchar(4) NOT NULL,
  `id_siswa` varchar(8) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_kelas`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `kd_mapel` varchar(3) NOT NULL,
  `nm_mapel` varchar(20) NOT NULL,
  `kd_kelas` varchar(4) NOT NULL,
  `id_guru` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_mapel`),
  KEY `kd_kelas` (`kd_kelas`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `no` int(11) NOT NULL,
  `id_siswa` varchar(8) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kd_mapel` varchar(3) NOT NULL,
  `kkm` int(4) NOT NULL,
  `nilai_rapor` int(4) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `kd_mapel` (`kd_mapel`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` varchar(8) NOT NULL,
  `nm_siswa` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nm_ayah` varchar(40) NOT NULL,
  `nm_ibu` varchar(40) NOT NULL,
  `nm_wali` varchar(40) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `pekerjaan_wali` varchar(20) NOT NULL,
  `diterima_ditingkat` int(3) NOT NULL,
  `diterima_tanggal` date NOT NULL,
  `no_sttb` varchar(20) NOT NULL,
  `tahun_sttb` int(4) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nm_siswa`, `password`, `angkatan`, `jk`, `agama`, `alamat`, `nm_ayah`, `nm_ibu`, `nm_wali`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pekerjaan_wali`, `diterima_ditingkat`, `diterima_tanggal`, `no_sttb`, `tahun_sttb`, `anak_ke`) VALUES
('102', 'a', 'ec8956637a99787bd197eacd77acce5e', '2010', 'p', 'islam', 'j', 'h', 'f', 'd', 's', 'h', 'fghthth', 2, '2013-03-05', '3', 2, 2),
('134', 'hfjj', '02522a2b2726fb0a03bb19f2d8d9524d', '', 'L', '', 'dwwetg', '', '', '', '', '', '', 0, '0000-00-00', '', 0, 0),
('1344', 'rttyuu', 'a50abba8132a77191791390c3eb19fe7', '', 'p', '', 'tjdtku', '', '', '', '', '', '', 0, '0000-00-00', '', 0, 0),
('234', 'ggsss', '289dff07669d7a23de0ef88d2f7129e7', '', 'P', '', 'jkfutercbkd', '', '', '', '', '', '', 0, '0000-00-00', '', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
