-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 19 mars 2018 à 18:28
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
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL COMMENT 'en VARCHAR 255',
  `contenu` longtext COMMENT 'en LONGTEXT',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `category_id`) VALUES
(1, 'article1', 'Contenu de l\'article 1\r\nAnimi, id est laborum et dolorum fuga. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat.\r\n\r\nQuia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2018-03-19 15:07:20', 1),
(2, 'article2', 'Contenu de l\'article 2\r\nAnimi, id est laborum et dolorum fuga. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat.\r\n\r\nQuia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2018-03-19 15:07:30', 2),
(3, 'article 3', 'Contenu de l\'article 3\r\nAnimi, id est laborum et dolorum fuga. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat.\r\n\r\nQuia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2018-03-19 15:07:38', 1),
(4, 'article 4', 'Contenu de l\'article 4\r\nAnimi, id est laborum et dolorum fuga. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat.\r\n\r\nQuia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit. Ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2018-03-19 15:07:48', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
