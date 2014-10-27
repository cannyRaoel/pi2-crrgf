-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Octobre 2014 à 01:57
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `artsauxencheres`
--

-- --------------------------------------------------------

--
-- Structure de la table `pi2_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `pi2_utilisateurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `courriel` varchar(70) NOT NULL,
  `motDePasse` varchar(60) NOT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `type` enum('membre','admin') NOT NULL DEFAULT 'membre',
  `etat` enum('inactif','actif') NOT NULL DEFAULT 'actif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pi2_utilisateurs`
--

INSERT INTO `pi2_utilisateurs` (`id`, `nom`, `prenom`, `courriel`, `motDePasse`, `telephone`, `type`, `etat`) VALUES
(1, 'Simard', '', '', '', NULL, 'membre', 'actif'),
(2, 'Travis', '', '', '', NULL, 'membre', 'actif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
