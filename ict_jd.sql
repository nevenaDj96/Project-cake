-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2015 at 10:33 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ict_jd`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa_opcije`
--

CREATE TABLE IF NOT EXISTS `anketa_opcije` (
  `id_ankete_opcije` int(11) NOT NULL,
  `tekst` varchar(30) NOT NULL,
  `red_br` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anketa_rezultati`
--

CREATE TABLE IF NOT EXISTS `anketa_rezultati` (
  `id_ankete_rez` int(11) NOT NULL,
  `odabrana_opcija` varchar(30) NOT NULL,
  `datum_ankete` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anketa_rezultati`
--

INSERT INTO `anketa_rezultati` (`id_ankete_rez`, `odabrana_opcija`, `datum_ankete`) VALUES
(2, 'Cokoladni', '2015-06-15 03:27:40'),
(9, 'Posni', '2015-06-15 03:37:36'),
(12, 'Posni', '2015-06-15 03:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE IF NOT EXISTS `artikli` (
  `id_artikla` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `kolicina` varchar(30) NOT NULL DEFAULT '1 komad',
  `cena` float NOT NULL,
  `opis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnika` int(11) NOT NULL,
  `kor_ime` varchar(30) NOT NULL,
  `lozinka` varchar(30) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `pol` char(1) DEFAULT NULL,
  `grad` varchar(30) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `id_uloge` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `kor_ime`, `lozinka`, `ime`, `prezime`, `pol`, `grad`, `email`, `id_uloge`) VALUES
(2, 'pera', 'pera1', 'Pera', 'Peric', 'M', 'Beograd', 'pera@gmail.com', 1),
(3, 'jovana', 'j1', 'Jovana', 'Djordjevic', 'Z', 'Beograd', 'jovana@yahoo.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meni_stavke`
--

CREATE TABLE IF NOT EXISTS `meni_stavke` (
  `id_stavke` int(11) NOT NULL,
  `naslov` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(30) NOT NULL,
  `red_br` int(11) DEFAULT NULL,
  `id_nad_stavke` int(11) DEFAULT NULL,
  `id_uloge` int(11) NOT NULL DEFAULT '0' COMMENT '0 - svi vide stavku, 1 - useri i admini, 2 - admini'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meni_stavke`
--

INSERT INTO `meni_stavke` (`id_stavke`, `naslov`, `url`, `red_br`, `id_nad_stavke`, `id_uloge`) VALUES
(1, 'O NAMA', 'onama.php', 1, NULL, 0),
(3, 'O KOLACIMA', 'tajne.php', 3, NULL, 0),
(4, 'GALERIJA', 'galerija.php', 4, 3, 0),
(5, 'CENOVNIK', 'cenovnik.php', 5, 3, 0),
(6, 'ANKETA', 'anketa.php', 6, 3, 1),
(7, 'KORISNICI', '#', 7, NULL, 0),
(8, 'O AUTORU', 'omeni.php', 8, NULL, 0),
(9, 'POCETNA', 'index.php', 0, NULL, 0),
(10, 'LOGIN', 'login.php', 11, 7, 0),
(11, 'REGISTRACIJA', 'registracija.php', 12, 7, 0),
(12, 'KONTAKT', 'kontakt.php', 13, 7, 1),
(13, 'ADMIN PANEL', 'admin_panel.php', 10, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE IF NOT EXISTS `poruke` (
  `id_poruke` int(11) NOT NULL,
  `kategorija` varchar(30) NOT NULL,
  `tekst` varchar(1000) NOT NULL,
  `id_korisnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE IF NOT EXISTS `slike` (
  `id_slike` int(11) NOT NULL,
  `url_slike` varchar(30) NOT NULL,
  `url_male_slike` varchar(30) NOT NULL,
  `mesto` varchar(30) NOT NULL,
  `red_br` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id_slike`, `url_slike`, `url_male_slike`, `mesto`, `red_br`) VALUES
(1, 'slika11.jpg', 'slika11_mala.jpg', 'galerija', 6),
(2, 'slika22.jpg', 'slika22_mala.jpg', 'galerija', 7),
(3, 'slider0.jpg', 'slider0tb.jpg', 'slide', 1),
(4, 'slider1.jpg', 'slider1tb.jpg', 'slide', 2),
(5, 'slider2.jpg', 'slider2tb.jpg', 'slide', 3),
(6, 'slider3.jpg', 'slider3tb.jpg', 'slide', 4),
(7, 'slika_velika12.jpg', 'slika_mala12.jpg', 'galerija', 8),
(8, 'slika_velika.jpg', 'slika_mala.jpg', 'galerija', 1),
(9, 'slika_velika13.jpg', 'slika_mala13.jpg', 'galerija', 2),
(10, 'slika6.jpg', 'slika6_mala.jpg', 'galerija', 3),
(11, 'slika7.jpg', 'slika7_mala.jpg', 'galerija', 4),
(12, 'slika8.jpg', 'slika8_mala.jpg', 'galerija', 5);

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE IF NOT EXISTS `uloge` (
  `id_uloge` int(11) NOT NULL,
  `uloga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloge`, `uloga`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa_opcije`
--
ALTER TABLE `anketa_opcije`
  ADD PRIMARY KEY (`id_ankete_opcije`);

--
-- Indexes for table `anketa_rezultati`
--
ALTER TABLE `anketa_rezultati`
  ADD PRIMARY KEY (`id_ankete_rez`);

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id_artikla`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`), ADD UNIQUE KEY `kor_ime` (`kor_ime`);

--
-- Indexes for table `meni_stavke`
--
ALTER TABLE `meni_stavke`
  ADD PRIMARY KEY (`id_stavke`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`id_poruke`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id_slike`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id_uloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa_opcije`
--
ALTER TABLE `anketa_opcije`
  MODIFY `id_ankete_opcije` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anketa_rezultati`
--
ALTER TABLE `anketa_rezultati`
  MODIFY `id_ankete_rez` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id_artikla` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meni_stavke`
--
ALTER TABLE `meni_stavke`
  MODIFY `id_stavke` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `id_poruke` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id_slike` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
