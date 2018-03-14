-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 14 mars 2018 à 19:26
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
(5, 2, 'Tronk', '2 Punaise', '2018-02-24 17:21:12'),
(15, 1, 'Cagole', 'Face rayonante, c\'est toi qui nettoye ?', '2018-03-12 14:48:12'),
(16, 1, 'GG', 'Trop cool perso je kiffe', '2018-03-12 09:36:46'),
(19, 4, 'Toto', 'Voici le commentaire de Toto qui s\'affiche sur plusieurs lignes si Toto veut bien ne pas s\'arreter d\'ecrire;  si Toto veut bien ne pas s\'arreter d\'ecrire; si Toto veut bien ne pas s\'arreter d\'ecrire; si Toto veut bien ne pas s\'arreter d\'ecrire; si Toto veut bien ne pas s\'arreter d\'ecrire; si Toto veut bien ne pas s\'arreter d\'ecrire; ... Toto s\'arrete !', '2018-03-12 14:42:23'),
(30, 3, 'Guilde des marchands', 'Le blocus de Corrusante est effectif. Rien ne doit pouvoir quitter la planete, meme l\'epice.', '2018-03-12 14:44:28'),
(31, 3, 'Cino', 'Starwars sauce Dune, peut mieux faire Haha', '2018-03-12 14:45:13'),
(32, 2, 'Clou', 'Faut s\'accrocher !', '2018-03-12 14:46:04'),
(33, 2, 'Scotch', 'Ça glisse pas trop par ici ;-)', '2018-03-12 14:46:48'),
(34, 1, 'Toutvenant', 'C\'est vraiment n\'importe-quoi ces commentaires... On dirait un vrai blog :D', '2018-03-12 14:49:07'),
(37, 4, 'Moi', 'Mettre les commentaires dans l\'ordre chrono !!', '2018-03-14 14:59:02'),
(39, 4, 'Cagole', 'Toujours des palabres', '2018-03-14 15:08:56'),
(40, 4, 'Toiture', 'C\'est pour quand ?', '2018-03-14 15:12:29'),
(41, 4, 'Sand\'', 'Ça vient au pas de l\'âne !!', '2018-03-14 15:12:55');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du commentaire', AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
