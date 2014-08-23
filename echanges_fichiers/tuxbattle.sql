-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 31 Juillet 2014 à 14:48
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tuxbattle`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_game`
--

DROP TABLE IF EXISTS `t_game`;
CREATE TABLE IF NOT EXISTS `t_game` (
  `idgame` int(11) NOT NULL AUTO_INCREMENT,
  `idp1` int(11) NOT NULL,
  `idp2` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  PRIMARY KEY (`idgame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_histo`
--

DROP TABLE IF EXISTS `t_histo`;
CREATE TABLE IF NOT EXISTS `t_histo` (
  `idhisto` int(11) NOT NULL DEFAULT '0',
  `idp1` int(11) NOT NULL,
  `arme1` float NOT NULL,
  `potion1` float NOT NULL,
  `sort1` float NOT NULL,
  `armure1` float NOT NULL,
  `mess1` varchar(50) NOT NULL,
  `idp2` int(11) NOT NULL,
  `arme2` float NOT NULL,
  `potion2` float NOT NULL,
  `sort2` float NOT NULL,
  `armure2` float NOT NULL,
  `mess2` varchar(50) NOT NULL,
  PRIMARY KEY (`idhisto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_joueur`
--

DROP TABLE IF EXISTS `t_joueur`;
CREATE TABLE IF NOT EXISTS `t_joueur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `avatar` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `armure` smallint(5) NOT NULL,
  `force` smallint(5) NOT NULL,
  `agility` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `t_weapon`
--

DROP TABLE IF EXISTS `t_weapon`;
CREATE TABLE IF NOT EXISTS `t_weapon` (
  `id_weapon` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `agility` smallint(5) NOT NULL,
  `puissance` smallint(5) NOT NULL,
  `pv` smallint(5) NOT NULL,
  `protection` tinyint(1) NOT NULL,
  `rand` tinyint(1) NOT NULL,
  `harakiri` tinyint(1) NOT NULL,
  `megadegats` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_weapon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_weapon`
--

INSERT INTO `t_weapon` (`id_weapon`, `type`, `nom`, `agility`, `puissance`, `pv`, `protection`, `rand`, `harakiri`, `megadegats`) VALUES
(1, 'arme', 'arc', 80, 40, 0, 0, 0, 0, 0),
(2, 'arme', 'epee', 50, 50, 0, 0, 0, 0, 0),
(3, 'arme', 'masse', 30, 100, 0, 0, 0, 0, 0),
(4, 'potion', 'surprise', 0, 0, 0, 0, 1, 0, 0),
(5, 'potion', 'maravak', 0, 0, 250, 0, 0, 0, 0),
(6, 'potion', 'joba', 0, 0, 0, 1, 0, 0, 0),
(7, 'sort', 'kiss', 0, 0, 0, 0, 0, 1, 0),
(8, 'sort', 'honey', 0, 0, 0, 0, 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
