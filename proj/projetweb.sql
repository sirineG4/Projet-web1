-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 déc. 2022 à 21:36
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `buy`
--

DROP TABLE IF EXISTS `buy`;
CREATE TABLE IF NOT EXISTS `buy` (
  `FirstName` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `paiement` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `buy`
--

INSERT INTO `buy` (`FirstName`, `lastname`, `email`, `phone`, `paiement`, `Address`) VALUES
('samer', 'soltani', 'soltanisamer02@gmail.com', '58172463', 'bank card', 'oued ellil');

-- --------------------------------------------------------

--
-- Structure de la table `joinus`
--

DROP TABLE IF EXISTS `joinus`;
CREATE TABLE IF NOT EXISTS `joinus` (
  `FirstName` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `collegename` varchar(100) NOT NULL,
  `studylevel` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joinus`
--

INSERT INTO `joinus` (`FirstName`, `lastname`, `collegename`, `studylevel`, `gender`, `email`, `phone`, `address`, `skills`) VALUES
('samer', 'soltani', 'ESSECT', 'Licence', 'male', 'soltanisamer02@gmail.com', '58172463', 'Manouba', 'gestion de stress/responsabilite'),
('sirine', 'rahal', 'ESSECT', 'Licence', 'female', 'rahalsirine2002@gmail.com', '12345678', 'Ezzahra', 'travaille en equipe');

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `FirstName` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `studylevel` varchar(100) NOT NULL,
  `collegename` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `register`
--

INSERT INTO `register` (`FirstName`, `lastname`, `age`, `studylevel`, `collegename`, `phone`, `email`) VALUES
('samer', 'soltani', '20', 'Licence', 'ESSECT', '58172463', 'soltanisamer02@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
