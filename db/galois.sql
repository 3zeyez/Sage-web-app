-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2022 at 12:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galois`
--
CREATE DATABASE IF NOT EXISTS `galois` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `galois`;

-- --------------------------------------------------------

--
-- Table structure for table `chaine`
--

CREATE TABLE `chaine` (
  `idchaine` int(11) NOT NULL DEFAULT 0,
  `nomchaine` varchar(50) NOT NULL DEFAULT '',
  `deschaine` varchar(50) NOT NULL DEFAULT '',
  `idstream` int(11) NOT NULL DEFAULT 0,
  `idcontenu` int(11) NOT NULL DEFAULT 0,
  `kkkk` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `ideleve` varchar(4) NOT NULL,
  `np` varchar(20) NOT NULL,
  `niveau` enum('1','2','3','4') NOT NULL,
  `idsec` int(11) NOT NULL,
  `tel` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`ideleve`, `np`, `niveau`, `idsec`, `tel`) VALUES
('E000', 'Ranim', '4', 1, '23456787'),
('E001', 'Ahmed Aziz Abbassi', '4', 1, '20258316'),
('E002', 'Hedi Maaoui', '4', 1, '21531940'),
('E003', 'Asma Bachrouch', '4', 4, '22333444'),
('E004', 'Med Aziz Guesmi', '4', 1, '92222222'),
('E005', 'Wael Ben Othmane', '2', 3, '21531940'),
('E006', 'Ahmed Aziz Abbassi', '3', 2, '20258316'),
('E007', 'Ahmed Aziz Abbassi', '3', 1, '20258316'),
('E008', 'sdfsadfsdf sdfdsaff', '3', 5, '22333444'),
('E009', 'Amir Abbassi', '2', 1, '20258316'),
('E010', 'Hanin 28236773', '2', 2, '20258316'),
('E011', 'Ahmed Aziz', '2', 1, '20258316'),
('E012', 'Ahmed Aziz', '1', 0, '20258316'),
('E013', 'Mech Aziz', '1', 0, '22333444'),
('E014', 'Ahmed Aziz', '1', 0, '29287316');

-- --------------------------------------------------------

--
-- Table structure for table `fpa`
--

CREATE TABLE `fpa` (
  `id` int(11) NOT NULL,
  `montant` decimal(6,3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fpr`
--

CREATE TABLE `fpr` (
  `id` int(11) NOT NULL,
  `nbs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

CREATE TABLE `grp` (
  `nomgrp` varchar(50) NOT NULL,
  `idprof` varchar(4) NOT NULL,
  `ideleve` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grps`
--

CREATE TABLE `grps` (
  `idgrp` varchar(4) NOT NULL,
  `nomgrp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mat`
--

CREATE TABLE `mat` (
  `idmat` int(11) NOT NULL,
  `mat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mat`
--

INSERT INTO `mat` (`idmat`, `mat`) VALUES
(1, 'Informatique'),
(2, 'Mathématique'),
(3, 'Physique'),
(4, 'Science naturelle');

-- --------------------------------------------------------

--
-- Table structure for table `mois`
--

CREATE TABLE `mois` (
  `id` int(11) NOT NULL,
  `idmois` int(11) NOT NULL,
  `ideleve` varchar(4) NOT NULL,
  `idprof` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `idprof` varchar(4) NOT NULL,
  `np` varchar(20) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `idmat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`idprof`, `np`, `tel`, `idmat`) VALUES
('P001', 'Wael Ben Othmane', '93305415', 2),
('P002', 'Wael Mrabet', '97160166', 1),
('P003', 'Dhamen Hami', '43523452', 1),
('P004', 'Asma Hami', '21531940', 3),
('P005', 'Imen Godhben', '23455678', 3),
('P006', 'Ahmed Aziz Abbassi', '20258316', 1),
('P007', 'akjdkj sdfasdf', '20258316', 2),
('P008', 'Meha Mechmech', '22333444', 1),
('P009', 'Ahmed Aziz', '20258316', 3),
('P010', 'Ahmed Aziz', '20258316', 3),
('P011', 'Ahmed Aziz', '20258316', 3),
('P012', 'Ahmed Aziz', '20258316', 2),
('P013', 'Ahmed Aziz', '20258316', 1),
('P014', 'Ahmed Aziz', '20258316', 1),
('P015', 'Ahmed Aziz', '20258316', 3),
('P016', 'Ahmed Aziz', '20258316', 1),
('P017', 'Mech Meha', '22333444', 2),
('P018', 'Mech Meha', '22333444', 2),
('P019', 'Mech Meha', '20258316', 2),
('P020', 'Ahmed Aziz', '90999876', 2);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `idsec` int(11) NOT NULL,
  `sec` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`idsec`, `sec`) VALUES
(0, 'Pas de section'),
(1, 'Sciences informatiques'),
(2, 'Mathématique'),
(3, 'Sciences techniques'),
(4, 'Sciences expérimentales'),
(5, 'Economie et gestion'),
(6, 'Lettres');

-- --------------------------------------------------------

--
-- Table structure for table `sreamer`
--

CREATE TABLE `sreamer` (
  `idstream` int(11) NOT NULL DEFAULT 0,
  `pseudo` varchar(50) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `pays` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pwd`) VALUES
('admin', 'admin'),
('root', 'root'),
('user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chaine`
--
ALTER TABLE `chaine`
  ADD PRIMARY KEY (`idchaine`),
  ADD KEY `idstream` (`idstream`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`ideleve`),
  ADD KEY `idsec` (`idsec`);

--
-- Indexes for table `fpa`
--
ALTER TABLE `fpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fpr`
--
ALTER TABLE `fpr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`nomgrp`,`idprof`,`ideleve`),
  ADD KEY `idprof` (`idprof`),
  ADD KEY `ideleve` (`ideleve`);

--
-- Indexes for table `grps`
--
ALTER TABLE `grps`
  ADD PRIMARY KEY (`idgrp`,`nomgrp`);

--
-- Indexes for table `mat`
--
ALTER TABLE `mat`
  ADD PRIMARY KEY (`idmat`);

--
-- Indexes for table `mois`
--
ALTER TABLE `mois`
  ADD PRIMARY KEY (`id`,`idmois`,`ideleve`,`idprof`),
  ADD KEY `fkideleve` (`ideleve`),
  ADD KEY `fkidporf` (`idprof`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`idprof`),
  ADD KEY `idmat` (`idmat`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idsec`);

--
-- Indexes for table `sreamer`
--
ALTER TABLE `sreamer`
  ADD PRIMARY KEY (`idstream`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `section` FOREIGN KEY (`idsec`) REFERENCES `section` (`idsec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fpa`
--
ALTER TABLE `fpa`
  ADD CONSTRAINT `fk_id_fpa` FOREIGN KEY (`id`) REFERENCES `mois` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fpr`
--
ALTER TABLE `fpr`
  ADD CONSTRAINT `fk_id_fpr` FOREIGN KEY (`id`) REFERENCES `mois` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grp`
--
ALTER TABLE `grp`
  ADD CONSTRAINT `ideleve` FOREIGN KEY (`ideleve`) REFERENCES `eleve` (`ideleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idprof` FOREIGN KEY (`idprof`) REFERENCES `prof` (`idprof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mois`
--
ALTER TABLE `mois`
  ADD CONSTRAINT `fkideleve` FOREIGN KEY (`ideleve`) REFERENCES `eleve` (`ideleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkidporf` FOREIGN KEY (`idprof`) REFERENCES `prof` (`idprof`);

--
-- Constraints for table `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `matiere` FOREIGN KEY (`idmat`) REFERENCES `mat` (`idmat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
