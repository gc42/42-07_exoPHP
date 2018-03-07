-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 07 mars 2018 à 18:04
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
-- Structure de la table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL COMMENT 'identifiant du commentaire',
  `id_post` int(11) NOT NULL COMMENT 'identifiant du billet concerne',
  `author` varchar(255) NOT NULL COMMENT 'auteur du commentaire',
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `id_post`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Guillaume', '1 Pas mal!', '2018-02-20 09:21:12'),
(2, 1, 'Max', '1 Trop cool', '2018-02-21 17:21:12'),
(3, 3, 'Guuillaume', '3 Genial!!', '2018-02-22 17:21:12'),
(4, 4, 'GenXR', '4 patate', '2018-02-23 17:21:12'),
(5, 2, 'Tronk', '2 Punaise', '2018-02-24 17:21:12'),
(6, 4, 'H', '4 smugl', '2018-02-24 17:25:15'),
(7, 4, 'K', '4 Kput', '2018-02-24 17:25:15'),
(8, 4, 'TOTO', 'sdfgsdfg', '2018-03-07 17:10:19'),
(9, 4, 'Moi', 'prout', '2018-03-07 17:10:36'),
(10, 4, 'Toi', 'autres', '2018-03-07 17:12:01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
