-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 14 fév. 2018 à 19:09
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
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Structure de la table `jeux_video`
--

CREATE TABLE `jeux_video` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `possesseur` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `nbre_joueurs_max` int(11) NOT NULL DEFAULT '0',
  `commentaires` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux_video`
--

UPDATE `jeux_video` SET `ID` = 1,`nom` = 'Super Mario Bros',`possesseur` = 'Florent',`console` = 'NES',`prix` = 4,`nbre_joueurs_max` = 1,`commentaires` = 'Un jeu d\'anthologie !' WHERE `jeux_video`.`ID` = 1 AND `jeux_video`.`nom` = 'Super Mario Bros' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'NES' AND CONCAT(`jeux_video`.`prix`) = '4' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un jeu d\'anthologie !';
UPDATE `jeux_video` SET `ID` = 2,`nom` = 'Sonic',`possesseur` = 'Patrick',`console` = 'Megadrive',`prix` = 2,`nbre_joueurs_max` = 1,`commentaires` = 'Pour moi, le meilleur jeu du monde !' WHERE `jeux_video`.`ID` = 2 AND `jeux_video`.`nom` = 'Sonic' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Megadrive' AND CONCAT(`jeux_video`.`prix`) = '2' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Pour moi, le meilleur jeu du monde !';
UPDATE `jeux_video` SET `ID` = 3,`nom` = 'Zelda : ocarina of time',`possesseur` = 'Florent',`console` = 'Nintendo 64',`prix` = 15,`nbre_joueurs_max` = 1,`commentaires` = 'Un jeu grand, beau et complet comme on en voit rarement de nos jours' WHERE `jeux_video`.`ID` = 3 AND `jeux_video`.`nom` = 'Zelda : ocarina of time' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Nintendo 64' AND CONCAT(`jeux_video`.`prix`) = '15' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un jeu grand, beau et complet comme on en voit rarement de nos jours';
UPDATE `jeux_video` SET `ID` = 4,`nom` = 'Mario Kart 64',`possesseur` = 'Florent',`console` = 'Nintendo 64',`prix` = 25,`nbre_joueurs_max` = 4,`commentaires` = 'Un excellent jeu de kart !' WHERE `jeux_video`.`ID` = 4 AND `jeux_video`.`nom` = 'Mario Kart 64' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Nintendo 64' AND CONCAT(`jeux_video`.`prix`) = '25' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Un excellent jeu de kart !';
UPDATE `jeux_video` SET `ID` = 5,`nom` = 'Super Smash Bros Melee',`possesseur` = 'Michel',`console` = 'GameCube',`prix` = 55,`nbre_joueurs_max` = 4,`commentaires` = 'Un jeu de baston délirant !' WHERE `jeux_video`.`ID` = 5 AND `jeux_video`.`nom` = 'Super Smash Bros Melee' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'GameCube' AND CONCAT(`jeux_video`.`prix`) = '55' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Un jeu de baston délirant !';
UPDATE `jeux_video` SET `ID` = 6,`nom` = 'Dead or Alive',`possesseur` = 'Patrick',`console` = 'Xbox',`prix` = 60,`nbre_joueurs_max` = 4,`commentaires` = 'Le plus beau jeu de baston jamais créé' WHERE `jeux_video`.`ID` = 6 AND `jeux_video`.`nom` = 'Dead or Alive' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '60' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Le plus beau jeu de baston jamais créé';
UPDATE `jeux_video` SET `ID` = 7,`nom` = 'Dead or Alive Xtreme Beach Volley Ball',`possesseur` = 'Patrick',`console` = 'Xbox',`prix` = 60,`nbre_joueurs_max` = 4,`commentaires` = 'Un jeu de beach volley de toute beauté o_O' WHERE `jeux_video`.`ID` = 7 AND `jeux_video`.`nom` = 'Dead or Alive Xtreme Beach Volley Ball' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '60' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Un jeu de beach volley de toute beauté o_O';
UPDATE `jeux_video` SET `ID` = 8,`nom` = 'Enter the Matrix',`possesseur` = 'Michel',`console` = 'PC',`prix` = 45,`nbre_joueurs_max` = 1,`commentaires` = 'Plutôt bof comme jeu, mais ça complète bien le film' WHERE `jeux_video`.`ID` = 8 AND `jeux_video`.`nom` = 'Enter the Matrix' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'PC' AND CONCAT(`jeux_video`.`prix`) = '45' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Plutôt bof comme jeu, mais ça complète bien le film';
UPDATE `jeux_video` SET `ID` = 9,`nom` = 'Max Payne 2',`possesseur` = 'Michel',`console` = 'PC',`prix` = 50,`nbre_joueurs_max` = 1,`commentaires` = 'Très réaliste, une sorte de film noir sur fond d\'histoire d\'amour. A essayer !' WHERE `jeux_video`.`ID` = 9 AND `jeux_video`.`nom` = 'Max Payne 2' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'PC' AND CONCAT(`jeux_video`.`prix`) = '50' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Très réaliste, une sorte de film noir sur fond d\'histoire d\'amour. A essayer !';
UPDATE `jeux_video` SET `ID` = 10,`nom` = 'Yoshi\'s Island',`possesseur` = 'Florent',`console` = 'SuperNES',`prix` = 6,`nbre_joueurs_max` = 1,`commentaires` = 'Le paradis des Yoshis :o)' WHERE `jeux_video`.`ID` = 10 AND `jeux_video`.`nom` = 'Yoshi\'s Island' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'SuperNES' AND CONCAT(`jeux_video`.`prix`) = '6' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Le paradis des Yoshis :o)';
UPDATE `jeux_video` SET `ID` = 11,`nom` = 'Commandos 3',`possesseur` = 'Florent',`console` = 'PC',`prix` = 44,`nbre_joueurs_max` = 12,`commentaires` = 'Un bon jeu d\'action où on dirige un commando pendant la 2ème guerre mondiale !' WHERE `jeux_video`.`ID` = 11 AND `jeux_video`.`nom` = 'Commandos 3' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'PC' AND CONCAT(`jeux_video`.`prix`) = '44' AND `jeux_video`.`nbre_joueurs_max` = 12 AND `jeux_video`.`commentaires` = 'Un bon jeu d\'action où on dirige un commando pendant la 2ème guerre mondiale !';
UPDATE `jeux_video` SET `ID` = 12,`nom` = 'Final Fantasy X',`possesseur` = 'Patrick',`console` = 'PS2',`prix` = 40,`nbre_joueurs_max` = 1,`commentaires` = 'Encore un Final Fantasy mais celui la est encore plus beau !' WHERE `jeux_video`.`ID` = 12 AND `jeux_video`.`nom` = 'Final Fantasy X' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '40' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Encore un Final Fantasy mais celui la est encore plus beau !';
UPDATE `jeux_video` SET `ID` = 13,`nom` = 'Pokemon Rubis',`possesseur` = 'Florent',`console` = 'GBA',`prix` = 44,`nbre_joueurs_max` = 4,`commentaires` = 'Pika-Pika-chu !!!' WHERE `jeux_video`.`ID` = 13 AND `jeux_video`.`nom` = 'Pokemon Rubis' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'GBA' AND CONCAT(`jeux_video`.`prix`) = '44' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Pika-Pika-chu !!!';
UPDATE `jeux_video` SET `ID` = 14,`nom` = 'Starcraft',`possesseur` = 'Michel',`console` = 'PC',`prix` = 19,`nbre_joueurs_max` = 8,`commentaires` = 'Le meilleur jeux pc de tout les temps !' WHERE `jeux_video`.`ID` = 14 AND `jeux_video`.`nom` = 'Starcraft' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'PC' AND CONCAT(`jeux_video`.`prix`) = '19' AND `jeux_video`.`nbre_joueurs_max` = 8 AND `jeux_video`.`commentaires` = 'Le meilleur jeux pc de tout les temps !';
UPDATE `jeux_video` SET `ID` = 15,`nom` = 'Grand Theft Auto 3',`possesseur` = 'Michel',`console` = 'PS2',`prix` = 30,`nbre_joueurs_max` = 1,`commentaires` = 'Comme dans les autres Gta on ecrase tout le monde :) .' WHERE `jeux_video`.`ID` = 15 AND `jeux_video`.`nom` = 'Grand Theft Auto 3' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '30' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Comme dans les autres Gta on ecrase tout le monde :) .';
UPDATE `jeux_video` SET `ID` = 16,`nom` = 'Homeworld 2',`possesseur` = 'Michel',`console` = 'PC',`prix` = 45,`nbre_joueurs_max` = 6,`commentaires` = 'Superbe ! o_O' WHERE `jeux_video`.`ID` = 16 AND `jeux_video`.`nom` = 'Homeworld 2' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'PC' AND CONCAT(`jeux_video`.`prix`) = '45' AND `jeux_video`.`nbre_joueurs_max` = 6 AND `jeux_video`.`commentaires` = 'Superbe ! o_O';
UPDATE `jeux_video` SET `ID` = 17,`nom` = 'Aladin',`possesseur` = 'Patrick',`console` = 'SuperNES',`prix` = 10,`nbre_joueurs_max` = 1,`commentaires` = 'Comme le dessin Animé !' WHERE `jeux_video`.`ID` = 17 AND `jeux_video`.`nom` = 'Aladin' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'SuperNES' AND CONCAT(`jeux_video`.`prix`) = '10' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Comme le dessin Animé !';
UPDATE `jeux_video` SET `ID` = 18,`nom` = 'Super Mario Bros 3',`possesseur` = 'Michel',`console` = 'SuperNES',`prix` = 10,`nbre_joueurs_max` = 2,`commentaires` = 'Le meilleur Mario selon moi.' WHERE `jeux_video`.`ID` = 18 AND `jeux_video`.`nom` = 'Super Mario Bros 3' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'SuperNES' AND CONCAT(`jeux_video`.`prix`) = '10' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Le meilleur Mario selon moi.';
UPDATE `jeux_video` SET `ID` = 19,`nom` = 'SSX 3',`possesseur` = 'Florent',`console` = 'Xbox',`prix` = 56,`nbre_joueurs_max` = 2,`commentaires` = 'Un très bon jeu de snow !' WHERE `jeux_video`.`ID` = 19 AND `jeux_video`.`nom` = 'SSX 3' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '56' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Un très bon jeu de snow !';
UPDATE `jeux_video` SET `ID` = 20,`nom` = 'Star Wars : Jedi outcast',`possesseur` = 'Patrick',`console` = 'Xbox',`prix` = 33,`nbre_joueurs_max` = 1,`commentaires` = 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !' WHERE `jeux_video`.`ID` = 20 AND `jeux_video`.`nom` = 'Star Wars : Jedi outcast' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '33' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !';
UPDATE `jeux_video` SET `ID` = 21,`nom` = 'Actua Soccer 3',`possesseur` = 'Patrick',`console` = 'PS',`prix` = 30,`nbre_joueurs_max` = 2,`commentaires` = 'Un jeu de foot assez bof ...' WHERE `jeux_video`.`ID` = 21 AND `jeux_video`.`nom` = 'Actua Soccer 3' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'PS' AND CONCAT(`jeux_video`.`prix`) = '30' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Un jeu de foot assez bof ...';
UPDATE `jeux_video` SET `ID` = 22,`nom` = 'Time Crisis 3',`possesseur` = 'Florent',`console` = 'PS2',`prix` = 40,`nbre_joueurs_max` = 1,`commentaires` = 'Un troisième volet efficace mais pas vraiment surprenant' WHERE `jeux_video`.`ID` = 22 AND `jeux_video`.`nom` = 'Time Crisis 3' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '40' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un troisième volet efficace mais pas vraiment surprenant';
UPDATE `jeux_video` SET `ID` = 23,`nom` = 'X-FILES',`possesseur` = 'Patrick',`console` = 'PS',`prix` = 25,`nbre_joueurs_max` = 1,`commentaires` = 'Un jeu censé ressembler a la série mais assez raté ...' WHERE `jeux_video`.`ID` = 23 AND `jeux_video`.`nom` = 'X-FILES' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'PS' AND CONCAT(`jeux_video`.`prix`) = '25' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un jeu censé ressembler a la série mais assez raté ...';
UPDATE `jeux_video` SET `ID` = 24,`nom` = 'Soul Calibur 2',`possesseur` = 'Patrick',`console` = 'Xbox',`prix` = 54,`nbre_joueurs_max` = 1,`commentaires` = 'Un jeu bien axé sur le combat' WHERE `jeux_video`.`ID` = 24 AND `jeux_video`.`nom` = 'Soul Calibur 2' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '54' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un jeu bien axé sur le combat';
UPDATE `jeux_video` SET `ID` = 25,`nom` = 'Diablo',`possesseur` = 'Florent',`console` = 'PS',`prix` = 20,`nbre_joueurs_max` = 1,`commentaires` = 'Comme sur PC mais la c\'est sur un ecran de télé :) !' WHERE `jeux_video`.`ID` = 25 AND `jeux_video`.`nom` = 'Diablo' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'PS' AND CONCAT(`jeux_video`.`prix`) = '20' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Comme sur PC mais la c\'est sur un ecran de télé :) !';
UPDATE `jeux_video` SET `ID` = 26,`nom` = 'Street Fighter 2',`possesseur` = 'Patrick',`console` = 'Megadrive',`prix` = 10,`nbre_joueurs_max` = 2,`commentaires` = 'Le célèbre jeu de combat !' WHERE `jeux_video`.`ID` = 26 AND `jeux_video`.`nom` = 'Street Fighter 2' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Megadrive' AND CONCAT(`jeux_video`.`prix`) = '10' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Le célèbre jeu de combat !';
UPDATE `jeux_video` SET `ID` = 27,`nom` = 'Gundam Battle Assault 2',`possesseur` = 'Florent',`console` = 'PS',`prix` = 29,`nbre_joueurs_max` = 1,`commentaires` = 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement' WHERE `jeux_video`.`ID` = 27 AND `jeux_video`.`nom` = 'Gundam Battle Assault 2' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'PS' AND CONCAT(`jeux_video`.`prix`) = '29' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement';
UPDATE `jeux_video` SET `ID` = 28,`nom` = 'Spider-Man',`possesseur` = 'Florent',`console` = 'Megadrive',`prix` = 15,`nbre_joueurs_max` = 1,`commentaires` = 'Vivez l\'aventure de l\'homme araignée' WHERE `jeux_video`.`ID` = 28 AND `jeux_video`.`nom` = 'Spider-Man' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Megadrive' AND CONCAT(`jeux_video`.`prix`) = '15' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Vivez l\'aventure de l\'homme araignée';
UPDATE `jeux_video` SET `ID` = 29,`nom` = 'Midtown Madness 3',`possesseur` = 'Michel',`console` = 'Xbox',`prix` = 59,`nbre_joueurs_max` = 6,`commentaires` = 'Dans la suite des autres versions de Midtown Madness' WHERE `jeux_video`.`ID` = 29 AND `jeux_video`.`nom` = 'Midtown Madness 3' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '59' AND `jeux_video`.`nbre_joueurs_max` = 6 AND `jeux_video`.`commentaires` = 'Dans la suite des autres versions de Midtown Madness';
UPDATE `jeux_video` SET `ID` = 30,`nom` = 'Tetris',`possesseur` = 'Florent',`console` = 'Gameboy',`prix` = 5,`nbre_joueurs_max` = 1,`commentaires` = 'Qui ne connait pas ? ' WHERE `jeux_video`.`ID` = 30 AND `jeux_video`.`nom` = 'Tetris' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Gameboy' AND CONCAT(`jeux_video`.`prix`) = '5' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Qui ne connait pas ? ';
UPDATE `jeux_video` SET `ID` = 31,`nom` = 'The Rocketeer',`possesseur` = 'Michel',`console` = 'NES',`prix` = 2,`nbre_joueurs_max` = 1,`commentaires` = 'Un super un film et un jeu de m*rde ...' WHERE `jeux_video`.`ID` = 31 AND `jeux_video`.`nom` = 'The Rocketeer' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'NES' AND CONCAT(`jeux_video`.`prix`) = '2' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un super un film et un jeu de m*rde ...';
UPDATE `jeux_video` SET `ID` = 32,`nom` = 'Pro Evolution Soccer 3',`possesseur` = 'Patrick',`console` = 'PS2',`prix` = 59,`nbre_joueurs_max` = 2,`commentaires` = 'Un petit jeu de foot sur PS2' WHERE `jeux_video`.`ID` = 32 AND `jeux_video`.`nom` = 'Pro Evolution Soccer 3' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '59' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Un petit jeu de foot sur PS2';
UPDATE `jeux_video` SET `ID` = 33,`nom` = 'Ice Hockey',`possesseur` = 'Michel',`console` = 'NES',`prix` = 7,`nbre_joueurs_max` = 2,`commentaires` = 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)' WHERE `jeux_video`.`ID` = 33 AND `jeux_video`.`nom` = 'Ice Hockey' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'NES' AND CONCAT(`jeux_video`.`prix`) = '7' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)';
UPDATE `jeux_video` SET `ID` = 34,`nom` = 'Sydney 2000',`possesseur` = 'Florent',`console` = 'Dreamcast',`prix` = 15,`nbre_joueurs_max` = 2,`commentaires` = 'Les JO de Sydney dans votre salon !' WHERE `jeux_video`.`ID` = 34 AND `jeux_video`.`nom` = 'Sydney 2000' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Dreamcast' AND CONCAT(`jeux_video`.`prix`) = '15' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Les JO de Sydney dans votre salon !';
UPDATE `jeux_video` SET `ID` = 35,`nom` = 'NBA 2k',`possesseur` = 'Patrick',`console` = 'Dreamcast',`prix` = 12,`nbre_joueurs_max` = 2,`commentaires` = 'A votre avis :p ?' WHERE `jeux_video`.`ID` = 35 AND `jeux_video`.`nom` = 'NBA 2k' AND `jeux_video`.`possesseur` = 'Patrick' AND `jeux_video`.`console` = 'Dreamcast' AND CONCAT(`jeux_video`.`prix`) = '12' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'A votre avis :p ?';
UPDATE `jeux_video` SET `ID` = 36,`nom` = 'Aliens Versus Predator : Extinction',`possesseur` = 'Michel',`console` = 'PS2',`prix` = 20,`nbre_joueurs_max` = 2,`commentaires` = 'Un shoot\'em up pour pc' WHERE `jeux_video`.`ID` = 36 AND `jeux_video`.`nom` = 'Aliens Versus Predator : Extinction' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '20' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Un shoot\'em up pour pc';
UPDATE `jeux_video` SET `ID` = 37,`nom` = 'Crazy Taxi',`possesseur` = 'Florent',`console` = 'Dreamcast',`prix` = 11,`nbre_joueurs_max` = 1,`commentaires` = 'Conduite de taxi en folie !' WHERE `jeux_video`.`ID` = 37 AND `jeux_video`.`nom` = 'Crazy Taxi' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Dreamcast' AND CONCAT(`jeux_video`.`prix`) = '11' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Conduite de taxi en folie !';
UPDATE `jeux_video` SET `ID` = 38,`nom` = 'Le Maillon Faible',`possesseur` = 'Mathieu',`console` = 'PS2',`prix` = 10,`nbre_joueurs_max` = 1,`commentaires` = 'Le jeu de l\'émission' WHERE `jeux_video`.`ID` = 38 AND `jeux_video`.`nom` = 'Le Maillon Faible' AND `jeux_video`.`possesseur` = 'Mathieu' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '10' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Le jeu de l\'émission';
UPDATE `jeux_video` SET `ID` = 39,`nom` = 'FIFA 64',`possesseur` = 'Michel',`console` = 'Nintendo 64',`prix` = 25,`nbre_joueurs_max` = 2,`commentaires` = 'Le premier jeu de foot sur la N64 =) !' WHERE `jeux_video`.`ID` = 39 AND `jeux_video`.`nom` = 'FIFA 64' AND `jeux_video`.`possesseur` = 'Michel' AND `jeux_video`.`console` = 'Nintendo 64' AND CONCAT(`jeux_video`.`prix`) = '25' AND `jeux_video`.`nbre_joueurs_max` = 2 AND `jeux_video`.`commentaires` = 'Le premier jeu de foot sur la N64 =) !';
UPDATE `jeux_video` SET `ID` = 40,`nom` = 'Qui Veut Gagner Des Millions',`possesseur` = 'Florent',`console` = 'PS2',`prix` = 10,`nbre_joueurs_max` = 1,`commentaires` = 'Le jeu de l\'émission' WHERE `jeux_video`.`ID` = 40 AND `jeux_video`.`nom` = 'Qui Veut Gagner Des Millions' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '10' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Le jeu de l\'émission';
UPDATE `jeux_video` SET `ID` = 41,`nom` = 'Monopoly',`possesseur` = 'Sebastien',`console` = 'Nintendo 64',`prix` = 21,`nbre_joueurs_max` = 4,`commentaires` = 'Bheuuu le monopoly sur N64 !' WHERE `jeux_video`.`ID` = 41 AND `jeux_video`.`nom` = 'Monopoly' AND `jeux_video`.`possesseur` = 'Sebastien' AND `jeux_video`.`console` = 'Nintendo 64' AND CONCAT(`jeux_video`.`prix`) = '21' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Bheuuu le monopoly sur N64 !';
UPDATE `jeux_video` SET `ID` = 42,`nom` = 'Taxi 3',`possesseur` = 'Corentin',`console` = 'PS2',`prix` = 19,`nbre_joueurs_max` = 4,`commentaires` = 'Un jeu de voiture sur le film' WHERE `jeux_video`.`ID` = 42 AND `jeux_video`.`nom` = 'Taxi 3' AND `jeux_video`.`possesseur` = 'Corentin' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '19' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Un jeu de voiture sur le film';
UPDATE `jeux_video` SET `ID` = 43,`nom` = 'Indiana Jones Et Le Tombeau De L\'Empereur',`possesseur` = 'Florent',`console` = 'PS2',`prix` = 25,`nbre_joueurs_max` = 1,`commentaires` = 'Notre aventurier préféré est de retour !!!' WHERE `jeux_video`.`ID` = 43 AND `jeux_video`.`nom` = 'Indiana Jones Et Le Tombeau De L\'Empereur' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'PS2' AND CONCAT(`jeux_video`.`prix`) = '25' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Notre aventurier préféré est de retour !!!';
UPDATE `jeux_video` SET `ID` = 44,`nom` = 'F-ZERO',`possesseur` = 'Mathieu',`console` = 'GBA',`prix` = 25,`nbre_joueurs_max` = 4,`commentaires` = 'Un super jeu de course futuriste !' WHERE `jeux_video`.`ID` = 44 AND `jeux_video`.`nom` = 'F-ZERO' AND `jeux_video`.`possesseur` = 'Mathieu' AND `jeux_video`.`console` = 'GBA' AND CONCAT(`jeux_video`.`prix`) = '25' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Un super jeu de course futuriste !';
UPDATE `jeux_video` SET `ID` = 45,`nom` = 'Harry Potter Et La Chambre Des Secrets',`possesseur` = 'Mathieu',`console` = 'Xbox',`prix` = 30,`nbre_joueurs_max` = 1,`commentaires` = 'Abracadabra !! Le célebre magicien est de retour !' WHERE `jeux_video`.`ID` = 45 AND `jeux_video`.`nom` = 'Harry Potter Et La Chambre Des Secrets' AND `jeux_video`.`possesseur` = 'Mathieu' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '30' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Abracadabra !! Le célebre magicien est de retour !';
UPDATE `jeux_video` SET `ID` = 46,`nom` = 'Half-Life',`possesseur` = 'Corentin',`console` = 'PC',`prix` = 15,`nbre_joueurs_max` = 32,`commentaires` = 'L\'autre meilleur jeu de tout les temps (surtout ses mods).' WHERE `jeux_video`.`ID` = 46 AND `jeux_video`.`nom` = 'Half-Life' AND `jeux_video`.`possesseur` = 'Corentin' AND `jeux_video`.`console` = 'PC' AND CONCAT(`jeux_video`.`prix`) = '15' AND `jeux_video`.`nbre_joueurs_max` = 32 AND `jeux_video`.`commentaires` = 'L\'autre meilleur jeu de tout les temps (surtout ses mods).';
UPDATE `jeux_video` SET `ID` = 47,`nom` = 'Myst III Exile',`possesseur` = 'Sébastien',`console` = 'Xbox',`prix` = 49,`nbre_joueurs_max` = 1,`commentaires` = 'Un jeu de réflexion' WHERE `jeux_video`.`ID` = 47 AND `jeux_video`.`nom` = 'Myst III Exile' AND `jeux_video`.`possesseur` = 'Sébastien' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '49' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Un jeu de réflexion';
UPDATE `jeux_video` SET `ID` = 48,`nom` = 'Wario World',`possesseur` = 'Sebastien',`console` = 'Gamecube',`prix` = 40,`nbre_joueurs_max` = 4,`commentaires` = 'Wario vs Mario ! Qui gagnera ! ?' WHERE `jeux_video`.`ID` = 48 AND `jeux_video`.`nom` = 'Wario World' AND `jeux_video`.`possesseur` = 'Sebastien' AND `jeux_video`.`console` = 'Gamecube' AND CONCAT(`jeux_video`.`prix`) = '40' AND `jeux_video`.`nbre_joueurs_max` = 4 AND `jeux_video`.`commentaires` = 'Wario vs Mario ! Qui gagnera ! ?';
UPDATE `jeux_video` SET `ID` = 49,`nom` = 'Rollercoaster Tycoon',`possesseur` = 'Florent',`console` = 'Xbox',`prix` = 29,`nbre_joueurs_max` = 1,`commentaires` = 'Jeu de gestion d\'un parc d\'attraction' WHERE `jeux_video`.`ID` = 49 AND `jeux_video`.`nom` = 'Rollercoaster Tycoon' AND `jeux_video`.`possesseur` = 'Florent' AND `jeux_video`.`console` = 'Xbox' AND CONCAT(`jeux_video`.`prix`) = '29' AND `jeux_video`.`nbre_joueurs_max` = 1 AND `jeux_video`.`commentaires` = 'Jeu de gestion d\'un parc d\'attraction';
UPDATE `jeux_video` SET `ID` = 51,`nom` = 'monjeu',`possesseur` = 'Moi',`console` = 'mac',`prix` = 15,`nbre_joueurs_max` = 9,`commentaires` = 'Le jeu le plus crevant du monde' WHERE `jeux_video`.`ID` = 51 AND `jeux_video`.`nom` = 'monjeu' AND `jeux_video`.`possesseur` = 'Moi' AND `jeux_video`.`console` = 'mac' AND CONCAT(`jeux_video`.`prix`) = '15' AND `jeux_video`.`nbre_joueurs_max` = 9 AND `jeux_video`.`commentaires` = 'Le jeu le plus crevant du monde';

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `minichat`
--

UPDATE `minichat` SET `id` = 1,`pseudo` = 'Tom',`message` = 'Il fait beau aujourd\'hui, vous ne trouvez pas ?' WHERE `minichat`.`id` = 1;
UPDATE `minichat` SET `id` = 2,`pseudo` = 'John',`message` = 'Ouais, ça faisait un moment qu\'on n\'avait pas vu la lumière du soleil !' WHERE `minichat`.`id` = 2;
UPDATE `minichat` SET `id` = 3,`pseudo` = 'Patrice',`message` = 'Ça vous tente d\'aller à la plage aujourd\'hui ? Y\'a de super vagues, c\'est top !' WHERE `minichat`.`id` = 3;
UPDATE `minichat` SET `id` = 4,`pseudo` = 'Tom',`message` = 'Cool, bonne idée ! J\'amène ma planche !' WHERE `minichat`.`id` = 4;
UPDATE `minichat` SET `id` = 5,`pseudo` = 'John',`message` = 'Comptez sur moi !' WHERE `minichat`.`id` = 5;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

UPDATE `news` SET `id` = 1,`titre` = 'Ma premiere news',`contenu` = 'Super, je vous fait lire ma premiere news. Genial !!' WHERE `news`.`id` = 1;
UPDATE `news` SET `id` = 2,`titre` = 'Ma deuxieme news',`contenu` = 'Seconde news\r\nCourage' WHERE `news`.`id` = 2;
UPDATE `news` SET `id` = 3,`titre` = 'Ma troisieme news',`contenu` = 'Troisieme news, et plus encore' WHERE `news`.`id` = 3;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeux_video`
--
ALTER TABLE `jeux_video`
  ADD KEY `ID` (`ID`);

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux_video`
--
ALTER TABLE `jeux_video`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
