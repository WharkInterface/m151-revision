-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 01 sep. 2021 à 08:29
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m151revision`
--
CREATE DATABASE IF NOT EXISTS `m151revision` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `m151revision`;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `idActivite` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique d''une activité.',
  `nomActivite` varchar(50) NOT NULL COMMENT 'Nom d''une activité.',
  PRIMARY KEY (`idActivite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique d''une classe.',
  `nomClasse` varchar(50) NOT NULL COMMENT 'Nom d''une classe.',
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `idEleve` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique d''un élève.',
  `nom` varchar(50) NOT NULL COMMENT 'Nom d''un élève.',
  `prenom` varchar(50) NOT NULL COMMENT 'Prénom d''un élève.',
  `idClasse` int(11) NOT NULL COMMENT 'Identifiant unique de la classe d''un élève.',
  PRIMARY KEY (`idEleve`),
  KEY `idClasse` (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Liste des élèves inscris.';

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

DROP TABLE IF EXISTS `inscrire`;
CREATE TABLE IF NOT EXISTS `inscrire` (
  `idActivite` int(11) NOT NULL COMMENT 'Identifiant unique d''une activité.',
  `idEleve` int(11) NOT NULL COMMENT 'Identifiant unique d''un élève.',
  KEY `idActivite` (`idActivite`),
  KEY `idEleve` (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `inscrire_ibfk_1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inscrire_ibfk_2` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
