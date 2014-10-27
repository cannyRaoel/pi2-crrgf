-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Octobre 2014 à 01:55
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
-- Structure de la table `pi2_oeuvres`
--

CREATE TABLE IF NOT EXISTS `pi2_oeuvres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` decimal(7,2) unsigned DEFAULT NULL,
  `dimension` varchar(32) NOT NULL,
  `poids` decimal(3,2) NOT NULL,
  `mediaUrl` varchar(70) NOT NULL,
  `etat` enum('disponible','en enchere','vendue','supprimé') NOT NULL DEFAULT 'disponible',
  `technique_id` int(10) unsigned NOT NULL,
  `theme_id` int(10) unsigned NOT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Oeuvres_Techniques1_idx` (`technique_id`),
  KEY `fk_Oeuvres_Themes1_idx` (`theme_id`),
  KEY `fk_Oeuvres_Utilisateurs1_idx` (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pi2_oeuvres`
--

INSERT INTO `pi2_oeuvres` (`id`, `titre`, `description`, `prix`, `dimension`, `poids`, `mediaUrl`, `etat`, `technique_id`, `theme_id`, `utilisateur_id`) VALUES
(1, 'Douceur de la nuit', 'Quae et sororem cum existimabat maritus ad suam so...', '0.00', '70x140', '9.99', '../medias/douceurNuit.jpg', 'en enchere', 2, 1, 1),
(2, 'Faune et Flore', 'Se est cum verbum legant Latinas qui Latinas verbu...', '0.00', '80x130', '9.99', '../medias/fauneFlore.jpg', 'disponible', 4, 2, 2),
(3, 'Faune et Flore', 'Latinas verbum scripta Se est cum verbum legant La...', '0.00', '80x130', '9.99', '../medias/fauneFlore.jpg', 'en enchere', 4, 4, 2),
(4, 'Faune et Flore', 'Se est cum verbum legant Latinas qui Latinas verbu...', '0.00', '70x140', '9.99', '../medias/fauneFlore.jpg', 'en enchere', 3, 1, 2),
(5, 'Douceur de la nuit', 'sororem cum existimabat maritus ad suam so...', '0.00', '70x140', '9.99', '../medias/douceurNuit.jpg', 'en enchere', 2, 3, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pi2_oeuvres`
--
ALTER TABLE `pi2_oeuvres`
  ADD CONSTRAINT `fk_Oeuvres_Techniques1` FOREIGN KEY (`technique_id`) REFERENCES `pi2_techniques` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oeuvres_Themes1` FOREIGN KEY (`theme_id`) REFERENCES `pi2_themes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oeuvres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
