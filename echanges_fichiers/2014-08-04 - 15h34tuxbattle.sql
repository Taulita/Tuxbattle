-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 04 Août 2014 à 15:34
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
  `name1` varchar(30) NOT NULL,
  `name2` varchar(30) NOT NULL,
  `winner` int(11) NOT NULL,
  PRIMARY KEY (`idgame`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_game`
--

INSERT INTO `t_game` (`idgame`, `name1`, `name2`, `winner`) VALUES
(1, 'Stephan', 'computer', 0),
(2, 'Stephan', 'computer', 0),
(3, '', 'computer', 0),
(4, '', 'computer', 0),
(5, '', 'computer', 0),
(6, 'Arnosorus', 'computer', 0),
(7, 'Pascal', 'computer', 0),
(8, 'theo', 'computer', 0),
(9, 'gi', 'computer', 0),
(10, 'moms', 'computer', 0),
(11, 'gi', 'computer', 0),
(12, 'zam', 'computer', 0),
(13, 'Arnosorus', 'computer', 0),
(14, 'Arnosorus', 'computer', 0),
(15, 'Arnosorus', 'computer', 0),
(16, 'Arnosorus', 'computer', 0),
(17, 'Arnosorus', 'computer', 0),
(18, 'Pascal', 'computer', 0),
(19, 'moms', 'computer', 0),
(20, 'moms', 'computer', 0),
(21, 'Arnosorus', 'computer', 0),
(22, 'Arnosorus', 'computer', 0),
(23, 'gi', 'computer', 0),
(24, 'Arnosorus', 'computer', 0),
(25, 'Arnosorus', 'computer', 0),
(26, 'Arnosorus', 'computer', 0),
(27, 'moms', 'computer', 0),
(28, 'zam', 'computer', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_histo`
--

DROP TABLE IF EXISTS `t_histo`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_histo`
--

INSERT INTO `t_histo` (`id`, `game`, `id1`, `arme1`, `potion1`, `sort1`, `armure1`, `message1`, `id2`, `message2`, `nom1`, `nom2`, `damage`) VALUES
(1, 1, 1, 'arc', 'Pas de potion', 'Pas de sort', '', '', 10, 'Houcht!', 'computer', 'Stephan', 2000),
(2, 1, 1, 'arc', 'Pas de potion', 'Pas de sort', '', '', 10, 'Houcht!', 'computer', 'Stephan', 2000),
(3, 1, 1, 'massu', 'Pas de potion', 'Pas de sort', '', '', 10, 'Houcht!', 'computer', 'Stephan', 4750),
(4, 1, 10, 'massu', 'joba', 'honey', '', '', 1, 'Houcht!', 'Stephan', 'computer', 4000),
(5, 1, 1, 'massu', 'Pas de potion', 'Pas de sort', '', '', 10, 'Houcht!', 'computer', 'Stephan', 4250),
(6, 2, 1, 'massu', 'Pas de potion', 'honey', '', '', 10, 'Houcht!', 'computer', 'Stephan', 5000),
(7, 2, 10, 'epee', 'maravak', 'honey', '', 'Cette potion est fantastique je me sens revivre!', 1, 'Houcht!', 'Stephan', 'computer', 2375),
(8, 2, 1, 'massu', 'Pas de potion', 'honey', '', '', 10, 'Houcht!', 'computer', 'Stephan', 4750),
(9, 2, 1, 'massu', 'Pas de potion', 'Pas de sort', '', '', 10, 'Houcht!', 'computer', 'Stephan', 4750),
(10, 7, 12, 'epee', 'Pas de potion', 'Pas de sort', '', '', 1, 'Esquive!', 'Pascal', 'computer', 2500),
(11, 7, 1, 'epee', 'joba', 'Pas de sort', '', '', 12, 'Houcht!', 'computer', 'Pascal', 2500),
(12, 7, 12, 'epee', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Pascal', 'computer', 2375),
(13, 7, 1, 'epee', 'surprise', 'honey', '', '', 12, 'Houcht!', 'computer', 'Pascal', 2375),
(14, 7, 12, 'epee', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Pascal', 'computer', 2125),
(15, 6, 11, 'arc', 'Pas de potion', 'honey', '', '', 1, 'Houcht!', 'Arnosorus', 'computer', 2000),
(16, 7, 12, 'epee', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Pascal', 'computer', 1625),
(17, 9, 15, 'massu', 'surprise', 'honey', '', '', 1, 'Houcht!', 'gi', 'computer', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `t_joueur`
--

DROP TABLE IF EXISTS `t_joueur`;
CREATE TABLE IF NOT EXISTS `t_joueur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `arme` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `avatar` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `armure` smallint(5) NOT NULL,
  `strength` smallint(5) NOT NULL,
  `agility` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `t_joueur`
--

INSERT INTO `t_joueur` (`id`, `nom`, `arme`, `email`, `password`, `avatar`, `defaite`, `victoire`, `pv`, `armure`, `strength`, `agility`) VALUES
(1, 'computer', 'arc', '', '', 0, 0, 0, -407, 1, 30, 1),
(10, 'Stephan', 'massu', 'stephan@azerty.fr', '202cb962ac59075b964b07152d234b70', 0, 0, 0, 1500, 100, 100, 100),
(11, 'Arnosorus', 'arc', 'arno@mail.com', 'a564de63c2d0da68cf47586ee05984d7', 0, 0, 0, 1500, 100, 100, 80),
(12, 'Pascal', 'epee', 'toto@toto.com', 'c33ca5e7eae116138d1d1b61158d58f9', 0, 0, 0, 400, 44, 65, 2),
(13, '<script>while(1>0){document.wr', '', 'emfjcj@zsefdzse.zsefd', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, 1500, 100, 100, 100),
(14, 'theo', '', 'tboy@free.fr', 'ceb8447cc4ab78d2ec34cd9f11e4bed2', 0, 0, 0, 1500, 100, 100, 100),
(15, 'gi', 'massu', 'gig@hotmail.fr', '97d6804053f94cbda00ec523d7d6b8a6', 0, 0, 1, 1500, 100, 100, 100),
(16, 'moms', '', 'defvgre@zerf.def', 'b495ce63ede0f4efc9eec62cb947c162', 0, 0, 0, 1500, 100, 100, 100),
(17, 'zam', '', 'azfazfa@kzj.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0, 0, 1500, 100, 100, 100);

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
  `class` varchar(12) NOT NULL,
  PRIMARY KEY (`id_weapon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_weapon`
--

INSERT INTO `t_weapon` (`id_weapon`, `type`, `nom`, `agility`, `puissance`, `pv`, `protection`, `rand`, `harakiri`, `megadegats`, `class`) VALUES
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
