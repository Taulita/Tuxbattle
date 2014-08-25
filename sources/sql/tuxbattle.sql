-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2014 at 11:46 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Dumping data for table `t_joueur`
--

INSERT INTO `t_joueur` (`id`, `nom`, `arme`, `email`, `password`, `avatar`, `defaite`, `victoire`, `pv`, `armure`, `strength`, `agility`) VALUES
(1, 'MakaTux', 'clear', '', '', 0, 29, 25, 1500, 100, 100, 100),
(19, 'Taulita', 'clear', 'taulita@free.fr', '827ccb0eea8a706c4c34a16891f84e7b', 0, 15, 29, 1500, 100, 100, 100),
(20, 'Mat', 'clear', 'mat@mat.fr', '6ca29d9bb530402bd09fe026ee838148', 0, 11, 3, 1500, 100, 100, 100);

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
