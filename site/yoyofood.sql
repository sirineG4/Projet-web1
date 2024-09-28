-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 05 mars 2023 à 12:23
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
-- Base de données : `yoyofood`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `addresse` varchar(100) NOT NULL,
  `codepostal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `motdepasse`, `phone`, `addresse`, `codepostal`) VALUES
('sirine', 'rahal', 'rahalsoltani@gmail.com', '5588', '859685', 'ikujytrg', 'Ã§oi_uytr'),
('ytg(r', 'yt', 'grebrtt@hgf.vom', '968527', '8574', 'oiuytre', 'oiuytrez'),
('samer', 'soltani', 'sqsfqsdf@thsg.jhg', '96857', '68527', 'poiuyt', 'poikujyhtgrf'),
('yjnhbtgvrf', 'jnhbgfv', 'said@gma.com', '8657', '6852', ';j,u,kjynhrfgv', 'ikujyhtg'),
('samer', 'soltani', 'htrhr@hotmail.com', '638527', '652741', 'ikujyhtgrf', ';kuj,ynhbgv'),
('kiujyhtg', 'l;kyjnhbgv', 'kujnyhb@samer.com', 'kujyhtgv', ',kjntbgvf', 'k,jnbhgv', 'kujyntbhgv'),
('dali', 'soltani', 'maysem@gmail.com', '87365', '6852', 'ml;k,ujnyh', 'l;kj,ynhbg'),
('samer', 'soltani', 'soltani@gmail.com', '835620', '9852', 'luj,kynhbgfv', ':;lj,knhb'),
('samer', 'soltani', 'soltani811soltanisoltani811@hotmail.com', '82028', '25585', 'kj,ynhtbg', 'jnhtbrgf'),
('dali', 'soltani', 'grfeds@gmail.com', '78965', '85241', 'yjnbgv', 'ku,jynhbgvf'),
('dali', 'php', 'dalisaid2000@gmail.com', '58585', '968527', 'yhtgrfed', 'tbrgvfd'),
('ezfa', 'efza', 'fer@gmail.com', '63852', '6352', 'kjynhg', ';ku,jynhbg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
