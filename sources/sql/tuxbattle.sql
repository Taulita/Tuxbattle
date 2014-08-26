-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2014 at 12:22 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tuxbattle`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_game`
--

CREATE TABLE IF NOT EXISTS `t_game` (
  `idgame` int(11) NOT NULL AUTO_INCREMENT,
  `name1` varchar(30) NOT NULL,
  `name2` varchar(30) NOT NULL,
  PRIMARY KEY (`idgame`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_game`
--

INSERT INTO `t_game` (`idgame`, `name1`, `name2`) VALUES
(1, 'Taulita', 'computer'),
(2, 'Taulita', 'computer'),
(3, 'Taulita', 'computer'),
(4, 'Taulita', 'computer'),
(5, 'Taulita', 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `t_histo`
--

CREATE TABLE IF NOT EXISTS `t_histo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` int(11) NOT NULL,
  `id1` int(11) NOT NULL,
  `arme1` varchar(32) NOT NULL,
  `potion1` varchar(32) NOT NULL,
  `sort1` varchar(32) NOT NULL,
  `armure1` varchar(32) NOT NULL,
  `message1` varchar(50) NOT NULL,
  `id2` int(11) NOT NULL,
  `message2` varchar(50) NOT NULL,
  `nom1` varchar(32) NOT NULL,
  `nom2` varchar(32) NOT NULL,
  `damage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `t_histo`
--

INSERT INTO `t_histo` (`id`, `game`, `id1`, `arme1`, `potion1`, `sort1`, `armure1`, `message1`, `id2`, `message2`, `nom1`, `nom2`, `damage`) VALUES
(1, 1, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 5000),
(2, 1, 1, 'massu', 'Pas de potion', 'honey', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 4750),
(3, 1, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4750),
(4, 1, 1, 'epee', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 1875),
(5, 1, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4250),
(6, 2, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 5000),
(7, 2, 1, 'arc', 'surprise', 'kiss', '', 'Damn, la potion n''a pas marchÃ©!', 19, 'Tu sais pas viser,  tu ne m''as pas touchÃ©!', 'MakaTux', 'Taulita', 1900),
(8, 2, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 5000),
(9, 2, 1, 'arc', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 1500),
(10, 2, 19, 'epee', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 2375),
(11, 2, 1, 'arc', 'Pas de potion', 'kiss', '', '', 19, 'Tu sais pas viser,  tu ne m''as pas touchÃ©!', 'MakaTux', 'Taulita', 700),
(12, 2, 19, 'epee', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 2375),
(13, 3, 19, 'epee', 'maravak', 'Pas de sort', '', 'Damn, la potion n''a pas marchÃ©!', 1, 'Houcht!', 'Taulita', 'MakaTux', 2500),
(14, 3, 1, 'massu', 'Pas de potion', 'honey', '', 'BrÃ»le dans les flammes de l''enfer!', 19, 'Bouclier Magique!', 'MakaTux', 'Taulita', 9500),
(15, 3, 19, 'massu', 'surprise', 'kiss', '', 'J''ai plus d''agilitÃ©!', 1, 'Tu sais pas viser,  tu ne m''as pas touchÃ©!', 'Taulita', 'MakaTux', 5000),
(16, 3, 1, 'massu', 'Pas de potion', 'honey', '', '', 19, 'Bouclier Magique!', 'MakaTux', 'Taulita', 4750),
(17, 3, 1, 'massu', 'Pas de potion', 'honey', '', 'BrÃ»le dans les flammes de l''enfer!', 19, 'Bouclier Magique!', 'MakaTux', 'Taulita', 9500),
(18, 3, 19, 'massu', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 5000),
(19, 3, 1, 'arc', 'maravak', 'Pas de sort', '', 'Damn, la potion n''a pas marchÃ©!', 19, 'Houcht!', 'MakaTux', 'Taulita', 1700),
(20, 3, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4750),
(21, 3, 1, 'arc', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 900),
(22, 3, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4500),
(23, 4, 19, 'massu', 'surprise', 'Pas de sort', '', 'J''ai plus d''agilitÃ©!', 1, 'Houcht!', 'Taulita', 'MakaTux', 5000),
(24, 4, 1, 'arc', 'maravak', 'Pas de sort', '', 'Damn, la potion n''a pas marchÃ©!', 19, 'Bouclier Magique!', 'MakaTux', 'Taulita', 1900),
(25, 4, 1, 'epee', 'surprise', 'Pas de sort', '', 'J''ai rÃ©parÃ© mon armure!', 19, 'Houcht!', 'MakaTux', 'Taulita', 2375),
(26, 4, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4750),
(27, 4, 1, 'massu', 'surprise', 'Pas de sort', '', 'J''ai plus d''agilitÃ©!', 19, 'Houcht!', 'MakaTux', 'Taulita', 4250),
(28, 4, 19, 'massu', 'joba', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4250),
(29, 4, 1, 'massu', 'Pas de potion', 'Pas de sort', '', '', 19, 'Bouclier Magique!', 'MakaTux', 'Taulita', 2250),
(30, 4, 19, 'massu', 'surprise', 'Pas de sort', '', 'Damn, la potion n''a pas marchÃ©!', 1, 'Houcht!', 'Taulita', 'MakaTux', 4250);

-- --------------------------------------------------------

--
-- Table structure for table `t_joueur`
--

CREATE TABLE IF NOT EXISTS `t_joueur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `arme` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `avatar` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `armure` smallint(5) NOT NULL,
  `strength` smallint(5) NOT NULL,
  `agility` smallint(5) NOT NULL,
  `bouclier` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Dumping data for table `t_joueur`
--

INSERT INTO `t_joueur` (`id`, `nom`, `arme`, `email`, `password`, `avatar`, `defaite`, `victoire`, `pv`, `armure`, `strength`, `agility`, `bouclier`) VALUES
(1, 'MakaTux', 'clear', '', '', 0, 33, 25, 1500, 100, 100, 100, 0),
(19, 'Taulita', 'clear', 'taulita@free.fr', '827ccb0eea8a706c4c34a16891f84e7b', 0, 15, 33, 1500, 100, 100, 100, 0),
(20, 'Mat', 'clear', 'mat@mat.fr', '6ca29d9bb530402bd09fe026ee838148', 0, 11, 3, 1500, 100, 100, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_weapon`
--

CREATE TABLE IF NOT EXISTS `t_weapon` (
  `id_weapon` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `agility` smallint(5) NOT NULL,
  `puissance` smallint(5) NOT NULL,
  `pv` smallint(5) NOT NULL,
  `protection` tinyint(1) NOT NULL,
  `rando` tinyint(1) NOT NULL,
  `harakiri` tinyint(1) NOT NULL,
  `megadegat` tinyint(1) NOT NULL,
  `class` varchar(12) NOT NULL,
  PRIMARY KEY (`id_weapon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_weapon`
--

INSERT INTO `t_weapon` (`id_weapon`, `type`, `nom`, `agility`, `puissance`, `pv`, `protection`, `rando`, `harakiri`, `megadegat`, `class`) VALUES
(1, 'arme', 'arc', 80, 40, 0, 0, 0, 0, 0, 'bow'),
(2, 'arme', 'epee', 50, 50, 0, 0, 0, 0, 0, 'sword'),
(3, 'arme', 'massu', 30, 100, 0, 0, 0, 0, 0, 'club'),
(4, 'potion', 'surprise', 0, 0, 0, 0, 1, 0, 0, 'poposurprise'),
(5, 'potion', 'maravak', 0, 0, 100, 0, 0, 0, 0, 'maravak'),
(6, 'potion', 'joba', 0, 0, 0, 1, 0, 0, 0, 'joba'),
(7, 'sort', 'kiss', 0, 0, 0, 0, 0, 1, 0, 'kiss'),
(8, 'sort', 'honey', 0, 0, 0, 0, 0, 0, 1, 'honey');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
