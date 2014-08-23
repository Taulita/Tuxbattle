-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 23 Août 2014 à 14:17
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `tuxbattle`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_game`
--

CREATE TABLE `t_game` (
  `idgame` int(11) NOT NULL AUTO_INCREMENT,
  `name1` varchar(30) NOT NULL,
  `name2` varchar(30) NOT NULL,
  PRIMARY KEY (`idgame`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_game`
--

INSERT INTO `t_game` (`idgame`, `name1`, `name2`) VALUES
(1, 'Taulita', 'computer'),
(2, 'Taulita', 'computer'),
(3, 'Taulita', 'computer'),
(4, 'Taulita', 'computer'),
(5, 'Taulita', 'computer'),
(6, 'Taulita', 'computer');

-- --------------------------------------------------------

--
-- Structure de la table `t_histo`
--

CREATE TABLE `t_histo` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `t_histo`
--

INSERT INTO `t_histo` (`id`, `game`, `id1`, `arme1`, `potion1`, `sort1`, `armure1`, `message1`, `id2`, `message2`, `nom1`, `nom2`, `damage`) VALUES
(1, 4, 19, 'massu', 'surprise', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 5000),
(2, 4, 1, 'massu', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 4750),
(3, 4, 19, 'arc', 'Pas de potion', 'honey', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 1900),
(4, 4, 19, 'massu', 'surprise', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 4750),
(5, 4, 1, 'arc', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 1300),
(6, 5, 19, 'arc', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 2000),
(7, 5, 1, 'epee', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 2375),
(8, 5, 1, 'arc', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 1900),
(9, 5, 19, 'epee', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 2250),
(10, 5, 1, 'epee', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 2250),
(11, 5, 19, 'arc', 'Pas de potion', 'Pas de sort', '', '', 1, 'Houcht!', 'Taulita', 'MakaTux', 1600),
(12, 5, 1, 'massu', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 4000),
(13, 5, 1, 'epee', 'Pas de potion', 'Pas de sort', '', '', 19, 'Houcht!', 'MakaTux', 'Taulita', 1750);

-- --------------------------------------------------------

--
-- Structure de la table `t_joueur`
--

CREATE TABLE `t_joueur` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Contenu de la table `t_joueur`
--

INSERT INTO `t_joueur` (`id`, `nom`, `arme`, `email`, `password`, `avatar`, `defaite`, `victoire`, `pv`, `armure`, `strength`, `agility`) VALUES
(1, 'MakaTux', 'clear', '', '', 0, 20, 21, 1500, 100, 100, 100),
(19, 'Taulita', 'clear', 'taulita@free.fr', '827ccb0eea8a706c4c34a16891f84e7b', 0, 11, 20, 1500, 100, 100, 100),
(20, 'Mat', 'clear', 'mat@mat.fr', '6ca29d9bb530402bd09fe026ee838148', 0, 11, 3, 1500, 100, 100, 100);

-- --------------------------------------------------------

--
-- Structure de la table `t_weapon`
--

CREATE TABLE `t_weapon` (
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
