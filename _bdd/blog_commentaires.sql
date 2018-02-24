-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 24 fév. 2018 à 19:10
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_commentaires`
--

CREATE TABLE IF NOT EXISTS `blog_commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire',
  `id_billet` int(11) NOT NULL COMMENT 'identifiant du billet concerne',
  `auteur` varchar(255) NOT NULL COMMENT 'auteur du commentaire',
  `commentaire` text NOT NULL,
  `date_commentaire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `blog_commentaires`:
--

--
-- Déchargement des données de la table `blog_commentaires`
--

INSERT IGNORE INTO `blog_commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'Guillaume', '1 Pas mal!', '2018-02-20 09:21:12'),
(2, 1, 'Max', '1 Trop cool', '2018-02-21 17:21:12'),
(3, 3, 'Guuillaume', '3 Genial!!', '2018-02-22 17:21:12'),
(4, 4, 'GenXR', '4 patate', '2018-02-23 17:21:12'),
(5, 2, 'Tronk', '2 Punaise', '2018-02-24 17:21:12'),
(6, 4, 'H', '4 smugl', '2018-02-24 17:25:15'),
(7, 4, 'K', '4 Kput', '2018-02-24 17:25:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
