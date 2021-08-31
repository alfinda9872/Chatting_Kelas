-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 01:23 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_chatting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chattingrpl`
--

CREATE TABLE IF NOT EXISTS `tb_chattingrpl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` date NOT NULL,
  `judul_foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(8) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('off','on') NOT NULL DEFAULT 'off',
  `akses_sebagai` enum('pengguna','pemilik') NOT NULL DEFAULT 'pengguna',
  `gender` enum('cowok','cewek') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `gol_darah` enum('A','B','AB','O') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `judul_foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
