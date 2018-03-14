-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 14 mars 2018 à 19:25
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
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL COMMENT 'nom du personnage',
  `degats` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'degats subis par le personnsge',
  `timeEndormi` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'date de reveil',
  `type` enum('magicien','guerrier') NOT NULL COMMENT 'type de personnage',
  `atout` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'specificite du personnage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `degats`, `timeEndormi`, `type`, `atout`) VALUES
(1, 'AA', 85, 0, 'magicien', 0),
(3, 'Paul', 15, 0, 'magicien', 0),
(4, 'Maurice', 50, 0, 'magicien', 0),
(10, 'DD', 0, 0, 'magicien', 0),
(11, 'Vador', 0, 0, 'magicien', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
