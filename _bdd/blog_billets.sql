-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 24 fév. 2018 à 19:09
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
-- Structure de la table `blog_billets`
--

CREATE TABLE IF NOT EXISTS `blog_billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `blog_billets`:
--

--
-- Déchargement des données de la table `blog_billets`
--

INSERT IGNORE INTO `blog_billets` (`id`, `titre`, `contenu`, `date_creation`, `auteur`) VALUES
(1, '1 Petit dejeuner', '1 Jus d\'orange et croissants, avec des paptes pour la petite Ambre qui ne doit pas trop manger pour ne pas vomir dans la voiture.', '2018-02-24 15:30:00', 'Guillaume'),
(2, '2 Descendre les bagages', '2 C\'est l\'heure de partir. Nous descendons les bagages dans le hall, ajustons nos cache-cols et c\'est parti!', '2018-02-24 15:40:00', 'Ambre'),
(3, '3 Sortir la voiture', '3 Isa me donne les clefs de la voiture. Je la sors du garage mais ne trouve pas de place du bon cote de la rue. Heureusement une place se libere, presque bien placee. Vite je redemarre et me glisse au plus pres.', '2018-02-24 15:45:25', 'Guillaume'),
(4, '4 Remplir la voiture', '4 C\'est pas le plus facile. Isa s\'occupe du coffre : ouf, toutes les valises rentrent. Par contre, nous rencontrons des difficultes pour fermer le coffre de toit. Arranger, re-arranger... rien n\'y fait. Et clic, enfin la cle tourne, et c\'est bon, meme le coffre est ferme.', '2018-02-24 15:50:25', 'Ambre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
