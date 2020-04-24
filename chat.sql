-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 avr. 2020 à 14:32
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `confinement`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `utilisateur`, `message`, `date`) VALUES
(10, 'Toast', 'Toast', '2020-04-23 15:25:19'),
(9, 'Toast', 'Toast', '2020-04-23 15:25:04'),
(8, 'w', 'w', '2020-04-23 15:16:30'),
(7, 'Toast', 'Toast', '2020-04-23 15:14:40'),
(11, 'Toast', 'Toast', '2020-04-23 15:33:31'),
(12, 'qsdsqdqsdsqd', 'qsdqsdqsdqsdqsd', '2020-04-16 00:00:00'),
(13, 'qsdsqdqsdsqd', 'qsdqsdqsdqsdqsd', '2020-04-16 00:00:00'),
(14, 'dfqqsdsdqsdq', 'qsdsdqsqddqsdqs', '2020-04-23 16:09:27'),
(15, 'Serjuani', 'Toast', '2020-04-23 16:12:34'),
(16, 'fqsdqsd', 'qsdqsd', '2020-04-23 16:17:16'),
(17, 'fqsdqsd', 'qsdqsd', '2020-04-23 16:17:20'),
(18, 'dqsdqsd', 'qsdqsdqsd', '2020-04-23 16:18:32'),
(19, 'qsdsqd', 'qsdqsdqsd', '2020-04-23 16:20:10'),
(20, 'Momo', 'toast', '2020-04-23 16:20:51'),
(21, 'ssasa', 'sasasa', '2020-04-23 16:21:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
