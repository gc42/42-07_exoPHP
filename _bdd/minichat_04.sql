-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 26 fév. 2018 à 13:45
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE `minichat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(12) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pour le projet Minichat''';

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`, `date_creation`) VALUES
(1, 'Tom', 'Il fait beau aujourd\'hui, vous avez vu ?', '2017-02-24 13:59:59'),
(2, 'John', 'Ouais, ça faisait un moment que je n\'étais pas sorti dehors. Ciel bleu plein soleil, c\'est cool !', '2018-01-24 13:59:59'),
(3, 'Patrice', 'Ça vous tente d\'aller à la plage aujourd\'hui ? Y\'a de super vagues !', '2018-01-25 13:59:59'),
(4, 'Tom', 'T\'as fumé, y a vent d\'Est ! Et tu as ressenti le froid qu\'il fait dehors?', '2018-01-25 14:59:59'),
(5, 'Moi', 'Complètement gaga ce mec là ! Un vrai fada ;-)\r\n->Vous avez remarqué: si c\'est \"Moi\", le message s\'affiche en rouge, cool...', '2018-02-23 12:59:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
