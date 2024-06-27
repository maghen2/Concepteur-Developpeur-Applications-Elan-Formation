-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 27 juin 2024 à 07:27
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id_acteur` int NOT NULL,
  `id_personne` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 16),
(15, 17),
(16, 18),
(17, 19),
(18, 20),
(19, 21),
(20, 22),
(21, 25),
(22, 26),
(23, 27),
(24, 28),
(25, 29),
(26, 30),
(27, 31),
(28, 32),
(29, 33),
(30, 34),
(31, 35),
(32, 36),
(33, 37),
(34, 38),
(35, 39),
(36, 40),
(37, 41),
(38, 42),
(39, 43),
(40, 44),
(41, 45),
(42, 46),
(43, 47),
(44, 48),
(45, 49),
(46, 50),
(47, 51),
(48, 52),
(49, 53),
(50, 54),
(51, 55),
(52, 56);

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

CREATE TABLE `casting` (
  `id_acteur` int NOT NULL,
  `id_film` int NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `casting`
--

INSERT INTO `casting` (`id_acteur`, `id_film`, `id_role`) VALUES
(1, 1, 15),
(6, 1, 12),
(7, 1, 26),
(10, 1, 16),
(11, 1, 5),
(12, 1, 5),
(16, 1, 5),
(16, 1, 24),
(18, 1, 22),
(21, 1, 17),
(28, 1, 12),
(29, 1, 10),
(29, 1, 13),
(34, 1, 25),
(39, 1, 12),
(39, 1, 25),
(39, 1, 30),
(40, 1, 18),
(42, 1, 21),
(42, 1, 25),
(45, 1, 24),
(46, 1, 25),
(51, 1, 21),
(5, 2, 27),
(10, 2, 18),
(13, 2, 13),
(17, 2, 29),
(20, 2, 1),
(21, 2, 15),
(23, 2, 20),
(26, 2, 10),
(30, 2, 13),
(31, 2, 21),
(35, 2, 1),
(35, 2, 24),
(39, 2, 3),
(40, 2, 22),
(44, 2, 7),
(47, 2, 18),
(48, 2, 29),
(1, 3, 5),
(3, 3, 10),
(4, 3, 26),
(4, 3, 29),
(6, 3, 11),
(16, 3, 6),
(16, 3, 24),
(20, 3, 6),
(20, 3, 29),
(21, 3, 20),
(24, 3, 17),
(24, 3, 25),
(25, 3, 12),
(26, 3, 3),
(26, 3, 14),
(27, 3, 3),
(27, 3, 11),
(27, 3, 23),
(28, 3, 8),
(28, 3, 12),
(31, 3, 15),
(33, 3, 22),
(35, 3, 1),
(35, 3, 10),
(37, 3, 24),
(41, 3, 1),
(42, 3, 24),
(5, 4, 21),
(7, 4, 28),
(9, 4, 9),
(10, 4, 16),
(13, 4, 2),
(13, 4, 8),
(14, 4, 4),
(14, 4, 18),
(15, 4, 4),
(15, 4, 5),
(15, 4, 29),
(16, 4, 14),
(20, 4, 1),
(22, 4, 23),
(27, 4, 20),
(29, 4, 30),
(35, 4, 10),
(41, 4, 18),
(44, 4, 15),
(44, 4, 17),
(45, 4, 8),
(48, 4, 23),
(52, 4, 10),
(1, 5, 1),
(4, 5, 10),
(8, 5, 27),
(20, 5, 3),
(22, 5, 25),
(25, 5, 23),
(35, 5, 12),
(41, 5, 25),
(41, 5, 30),
(50, 5, 20),
(1, 6, 10),
(2, 6, 9),
(4, 6, 27),
(8, 6, 19),
(9, 6, 26),
(11, 6, 16),
(12, 6, 10),
(14, 6, 18),
(16, 6, 11),
(18, 6, 6),
(18, 6, 11),
(19, 6, 3),
(20, 6, 3),
(20, 6, 18),
(21, 6, 14),
(22, 6, 1),
(22, 6, 10),
(30, 6, 5),
(31, 6, 8),
(34, 6, 23),
(35, 6, 12),
(36, 6, 27),
(39, 6, 8),
(41, 6, 18),
(41, 6, 30),
(43, 6, 21),
(44, 6, 5),
(46, 6, 7),
(49, 6, 26),
(1, 7, 8),
(2, 7, 13),
(3, 7, 26),
(3, 7, 27),
(3, 7, 30),
(4, 7, 2),
(4, 7, 23),
(5, 7, 2),
(11, 7, 11),
(11, 7, 27),
(12, 7, 26),
(13, 7, 15),
(15, 7, 17),
(18, 7, 29),
(19, 7, 22),
(24, 7, 4),
(25, 7, 2),
(29, 7, 3),
(33, 7, 8),
(41, 7, 7),
(44, 7, 30),
(45, 7, 30),
(47, 7, 4),
(47, 7, 17),
(50, 7, 15),
(51, 7, 1),
(52, 7, 4),
(52, 7, 24),
(1, 8, 18),
(4, 8, 11),
(8, 8, 18),
(9, 8, 3),
(11, 8, 15),
(19, 8, 10),
(21, 8, 27),
(23, 8, 23),
(24, 8, 12),
(25, 8, 25),
(31, 8, 9),
(32, 8, 13),
(32, 8, 19),
(36, 8, 10),
(39, 8, 15),
(40, 8, 13),
(40, 8, 23),
(42, 8, 30),
(43, 8, 4),
(46, 8, 18),
(50, 8, 13),
(3, 9, 8),
(4, 9, 28),
(5, 9, 19),
(10, 9, 30),
(18, 9, 10),
(18, 9, 30),
(23, 9, 7),
(23, 9, 21),
(23, 9, 22),
(26, 9, 26),
(28, 9, 22),
(30, 9, 2),
(30, 9, 20),
(30, 9, 21),
(31, 9, 15),
(33, 9, 14),
(34, 9, 5),
(34, 9, 8),
(34, 9, 18),
(42, 9, 5),
(44, 9, 18),
(48, 9, 30),
(52, 9, 22),
(1, 10, 8),
(13, 10, 5),
(14, 10, 11),
(17, 10, 22),
(18, 10, 27),
(20, 10, 11),
(22, 10, 1),
(22, 10, 4),
(30, 10, 14),
(31, 10, 6),
(33, 10, 11),
(34, 10, 19),
(39, 10, 12),
(42, 10, 10),
(49, 10, 16),
(52, 10, 16),
(52, 10, 25),
(3, 11, 14),
(4, 11, 3),
(4, 11, 25),
(13, 11, 3),
(16, 11, 1),
(16, 11, 5),
(21, 11, 18),
(22, 11, 21),
(24, 11, 3),
(26, 11, 25),
(30, 11, 27),
(34, 11, 20),
(35, 11, 4),
(36, 11, 9),
(38, 11, 17),
(39, 11, 29),
(41, 11, 26),
(43, 11, 30),
(46, 11, 19),
(51, 11, 12),
(51, 11, 19),
(1, 12, 7),
(2, 12, 26),
(3, 12, 26),
(7, 12, 26),
(8, 12, 26),
(8, 12, 29),
(11, 12, 21),
(16, 12, 1),
(16, 12, 6),
(17, 12, 29),
(19, 12, 7),
(19, 12, 10),
(23, 12, 13),
(29, 12, 7),
(30, 12, 9),
(30, 12, 14),
(35, 12, 12),
(37, 12, 30),
(42, 12, 17),
(43, 12, 11),
(44, 12, 3),
(44, 12, 28),
(46, 12, 19),
(50, 12, 6),
(51, 12, 30),
(8, 13, 23),
(9, 13, 17),
(10, 13, 18),
(11, 13, 23),
(14, 13, 13),
(14, 13, 20),
(16, 13, 14),
(20, 13, 4),
(22, 13, 3),
(23, 13, 12),
(24, 13, 13),
(24, 13, 26),
(30, 13, 9),
(35, 13, 12),
(35, 13, 18),
(36, 13, 29),
(37, 13, 29),
(39, 13, 20),
(41, 13, 29),
(49, 13, 9),
(52, 13, 12),
(2, 14, 16),
(2, 14, 26),
(18, 14, 2),
(21, 14, 17),
(24, 14, 30),
(25, 14, 26),
(26, 14, 14),
(26, 14, 17),
(29, 14, 18),
(32, 14, 20),
(36, 14, 9),
(37, 14, 22),
(1, 15, 18),
(5, 15, 18),
(9, 15, 25),
(12, 15, 19),
(13, 15, 25),
(14, 15, 20),
(17, 15, 15),
(17, 15, 29),
(18, 15, 17),
(21, 15, 25),
(34, 15, 29),
(36, 15, 19),
(37, 15, 19),
(40, 15, 15),
(41, 15, 8),
(44, 15, 6),
(44, 15, 23),
(45, 15, 7),
(46, 15, 27),
(2, 16, 25),
(8, 16, 14),
(12, 16, 30),
(17, 16, 15),
(17, 16, 21),
(18, 16, 10),
(18, 16, 11),
(19, 16, 9),
(27, 16, 20),
(28, 16, 16),
(32, 16, 18),
(33, 16, 5),
(34, 16, 5),
(37, 16, 24),
(38, 16, 30),
(42, 16, 3),
(42, 16, 22),
(43, 16, 21),
(44, 16, 2),
(45, 16, 24),
(50, 16, 21),
(1, 17, 30),
(2, 17, 21),
(8, 17, 26),
(9, 17, 13),
(10, 17, 19),
(14, 17, 25),
(14, 17, 28),
(23, 17, 1),
(28, 17, 23),
(31, 17, 22),
(33, 17, 9),
(33, 17, 16),
(35, 17, 16),
(37, 17, 12),
(38, 17, 2),
(42, 17, 7),
(44, 17, 21),
(47, 17, 6),
(51, 17, 15),
(2, 18, 3),
(3, 18, 6),
(3, 18, 11),
(5, 18, 7),
(6, 18, 2),
(6, 18, 15),
(11, 18, 1),
(12, 18, 10),
(14, 18, 13),
(16, 18, 4),
(16, 18, 14),
(17, 18, 6),
(17, 18, 18),
(18, 18, 3),
(23, 18, 4),
(25, 18, 10),
(32, 18, 25),
(35, 18, 14),
(35, 18, 18),
(37, 18, 6),
(41, 18, 23),
(44, 18, 21),
(48, 18, 15),
(7, 19, 29),
(8, 19, 1),
(9, 19, 11),
(13, 19, 18),
(15, 19, 13),
(15, 19, 21),
(15, 19, 28),
(18, 19, 23),
(18, 19, 25),
(20, 19, 14),
(20, 19, 26),
(22, 19, 1),
(22, 19, 25),
(26, 19, 7),
(35, 19, 15),
(36, 19, 8),
(38, 19, 4),
(39, 19, 7),
(39, 19, 27),
(41, 19, 2),
(41, 19, 19),
(49, 19, 26),
(51, 19, 17),
(52, 19, 16),
(3, 20, 28),
(5, 20, 28),
(18, 20, 9),
(21, 20, 26),
(23, 20, 12),
(25, 20, 4),
(29, 20, 29),
(30, 20, 15),
(31, 20, 4),
(36, 20, 30),
(47, 20, 22),
(2, 21, 26),
(8, 21, 22),
(10, 21, 12),
(13, 21, 18),
(19, 21, 13),
(23, 21, 11),
(23, 21, 17),
(28, 21, 28),
(29, 21, 5),
(31, 21, 14),
(34, 21, 15),
(37, 21, 5),
(37, 21, 28),
(50, 21, 2),
(51, 21, 5),
(51, 21, 11),
(51, 21, 22),
(7, 22, 23),
(15, 22, 17),
(26, 22, 25),
(34, 22, 6),
(34, 22, 28),
(40, 22, 8),
(47, 22, 4),
(51, 22, 1),
(51, 22, 15),
(51, 22, 18),
(52, 22, 25),
(4, 23, 1),
(4, 23, 10),
(6, 23, 10),
(12, 23, 7),
(14, 23, 20),
(16, 23, 10),
(19, 23, 23),
(20, 23, 26),
(25, 23, 28),
(28, 23, 24),
(31, 23, 22),
(32, 23, 4),
(32, 23, 10),
(35, 23, 5),
(35, 23, 10),
(35, 23, 15),
(42, 23, 25),
(47, 23, 7),
(3, 24, 30),
(5, 24, 2),
(5, 24, 6),
(7, 24, 30),
(11, 24, 9),
(12, 24, 9),
(12, 24, 24),
(17, 24, 24),
(18, 24, 4),
(18, 24, 24),
(19, 24, 23),
(21, 24, 26),
(22, 24, 26),
(22, 24, 27),
(24, 24, 19),
(24, 24, 30),
(25, 24, 3),
(25, 24, 11),
(28, 24, 28),
(37, 24, 5),
(40, 24, 2),
(43, 24, 26),
(46, 24, 26),
(49, 24, 30),
(50, 24, 27),
(51, 24, 1),
(51, 24, 8),
(51, 24, 26),
(2, 25, 8),
(10, 25, 17),
(12, 25, 17),
(14, 25, 4),
(22, 25, 22),
(26, 25, 21),
(27, 25, 11),
(28, 25, 30),
(32, 25, 21),
(34, 25, 26),
(41, 25, 12),
(44, 25, 8),
(48, 25, 4),
(51, 25, 17),
(13, 26, 22),
(15, 26, 14),
(16, 26, 3),
(16, 26, 22),
(17, 26, 26),
(24, 26, 11),
(27, 26, 8),
(30, 26, 9),
(37, 26, 18),
(44, 26, 2),
(2, 27, 3),
(3, 27, 4),
(7, 27, 19),
(7, 27, 23),
(8, 27, 22),
(9, 27, 23),
(9, 27, 28),
(12, 27, 13),
(15, 27, 18),
(16, 27, 29),
(17, 27, 18),
(18, 27, 25),
(21, 27, 27),
(22, 27, 11),
(28, 27, 5),
(33, 27, 21),
(35, 27, 16),
(36, 27, 16),
(38, 27, 19),
(38, 27, 28),
(41, 27, 1),
(45, 27, 6),
(46, 27, 5),
(49, 27, 2),
(49, 27, 7),
(49, 27, 9),
(49, 27, 29),
(1, 28, 14),
(1, 28, 16),
(2, 28, 15),
(2, 28, 25),
(4, 28, 9),
(6, 28, 7),
(8, 28, 7),
(12, 28, 26),
(13, 28, 22),
(15, 28, 11),
(16, 28, 12),
(16, 28, 28),
(18, 28, 28),
(19, 28, 3),
(22, 28, 17),
(22, 28, 18),
(27, 28, 8),
(28, 28, 8),
(36, 28, 19),
(38, 28, 8),
(38, 28, 30),
(41, 28, 4),
(41, 28, 30),
(44, 28, 5),
(47, 28, 22),
(47, 28, 24),
(48, 28, 1),
(51, 28, 9),
(9, 29, 2),
(12, 29, 3),
(15, 29, 24),
(16, 29, 8),
(20, 29, 19),
(20, 29, 24),
(24, 29, 4),
(24, 29, 16),
(26, 29, 13),
(29, 29, 1),
(34, 29, 6),
(35, 29, 22),
(41, 29, 20),
(46, 29, 14),
(47, 29, 25),
(48, 29, 23),
(5, 30, 22),
(11, 30, 17),
(12, 30, 28),
(14, 30, 10),
(17, 30, 9),
(18, 30, 27),
(22, 30, 2),
(22, 30, 7),
(22, 30, 30),
(24, 30, 28),
(25, 30, 2),
(33, 30, 20),
(34, 30, 9),
(39, 30, 10),
(42, 30, 10),
(42, 30, 23),
(42, 30, 28),
(42, 30, 30),
(44, 30, 24),
(45, 30, 22),
(46, 30, 12),
(48, 30, 18),
(48, 30, 29),
(49, 30, 2),
(50, 30, 21),
(52, 30, 3),
(6, 31, 10),
(7, 31, 10),
(7, 31, 20),
(8, 31, 29),
(9, 31, 2),
(9, 31, 7),
(9, 31, 26),
(11, 31, 24),
(13, 31, 22),
(16, 31, 11),
(16, 31, 19),
(19, 31, 2),
(20, 31, 14),
(24, 31, 3),
(32, 31, 3),
(50, 31, 4),
(50, 31, 15),
(51, 31, 16),
(52, 31, 23),
(3, 32, 22),
(10, 32, 29),
(14, 32, 26),
(15, 32, 23),
(17, 32, 19),
(18, 32, 9),
(20, 32, 5),
(20, 32, 30),
(40, 32, 2),
(41, 32, 8),
(48, 32, 11),
(50, 32, 29),
(51, 32, 15),
(8, 33, 1),
(15, 33, 2),
(19, 33, 3),
(23, 33, 16),
(28, 33, 18),
(29, 33, 21),
(29, 33, 26),
(37, 33, 23),
(38, 33, 13),
(41, 33, 29),
(46, 33, 21),
(46, 33, 27),
(50, 33, 18),
(51, 33, 24),
(1, 34, 9),
(2, 34, 22),
(5, 34, 27),
(6, 34, 9),
(9, 34, 25),
(9, 34, 26),
(10, 34, 5),
(11, 34, 24),
(12, 34, 27),
(17, 34, 22),
(18, 34, 18),
(24, 34, 30),
(26, 34, 28),
(29, 34, 14),
(34, 34, 20),
(35, 34, 26),
(38, 34, 19),
(39, 34, 6),
(41, 34, 4),
(42, 34, 10),
(49, 34, 12),
(50, 34, 12),
(51, 34, 5),
(2, 35, 9),
(6, 35, 17),
(6, 35, 24),
(7, 35, 12),
(7, 35, 19),
(11, 35, 20),
(15, 35, 11),
(18, 35, 13),
(20, 35, 5),
(20, 35, 22),
(22, 35, 1),
(26, 35, 11),
(26, 35, 12),
(33, 35, 6),
(33, 35, 29),
(36, 35, 20),
(39, 35, 19),
(40, 35, 6),
(44, 35, 11),
(45, 35, 17),
(47, 35, 16),
(50, 35, 23),
(51, 35, 7);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `date_sortie_fr` date NOT NULL,
  `duree` int NOT NULL,
  `synopsis` text COLLATE utf8mb3_bin NOT NULL,
  `id_realisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `date_sortie_fr`, `duree`, `synopsis`, `id_realisateur`) VALUES
(1, 'Pirates des Caraïbes : La Malédiction du Black Pearl', '2003-07-13', 143, 'Le pirate Jack Sparrow part à la recherche du trésor du Black Pearl.', 1),
(2, 'Pirates des Caraïbes : Le Secret du coffre maudit', '2006-07-12', 150, 'Jack Sparrow est à la recherche du coffre de Davy Jones.', 3),
(3, 'Pirates des Caraïbes : Jusqu\'au bout du monde', '2007-05-23', 168, 'Jack Sparrow et ses amis partent à la recherche de la Fontaine de Jouvence.', 3),
(4, 'Pirates des Caraïbes : La Fontaine de Jouvence', '2011-05-18', 136, 'Jack Sparrow est à la recherche de la Fontaine de Jouvence.', 1),
(5, 'Mission: Impossible', '1996-09-18', 110, 'L\'agent secret Ethan Hunt est accusé d\'avoir trahi son pays.', 2),
(6, 'Mission: Impossible 2', '2000-05-24', 123, 'Ethan Hunt doit affronter un ancien agent devenu terroriste.', 2),
(7, 'Mission: Impossible 3', '2006-05-03', 126, 'Ethan Hunt doit sauver sa femme des griffes d\'un trafiquant d\'armes.', 5),
(8, 'Mission: Impossible - Protocole Fantôme', '2011-12-14', 133, 'Ethan Hunt doit prouver l\'innocence de son équipe.', 2),
(9, 'Mission: Impossible - Rogue Nation', '2015-07-30', 131, 'Ethan Hunt doit affronter une organisation secrète.', 2),
(10, 'Mission: Impossible - Fallout', '2018-08-01', 147, 'Ethan Hunt doit empêcher une catastrophe mondiale.', 5),
(11, 'Mr. & Mrs. Smith', '2005-06-15', 120, 'Un couple découvre que chacun est un agent secret.', 3),
(12, 'Les Aventures de Tintin : Le Secret de la Licorne', '2011-10-26', 107, 'Tintin part à la recherche d\'un trésor caché.', 4),
(13, 'Inception', '2010-07-16', 148, 'Un voleur spécialisé dans l\'extraction d\'informations se retrouve embarqué dans un projet d\'inception.', 5),
(14, 'Interstellar', '2014-11-05', 169, 'Un groupe d\'explorateurs voyage à travers l\'espace pour trouver une nouvelle planète habitable.', 5),
(15, 'The Dark Knight', '2008-07-16', 152, 'Batman affronte le Joker, un criminel psychopathe.', 6),
(16, 'The Prestige', '2006-10-20', 130, 'Deux magiciens rivaux se lancent dans une compétition pour réaliser le meilleur tour.', 6),
(17, 'Gone Girl', '2014-10-01', 149, 'Un homme devient le principal suspect dans la disparition de sa femme.', 8),
(18, 'The Social Network', '2010-10-01', 120, 'L\'histoire de la création de Facebook.', 8),
(19, 'The Shawshank Redemption', '1994-09-23', 142, 'Un homme innocent est condamné à la prison à vie.', 9),
(20, 'The Green Mile', '1999-12-10', 189, 'Les histoires des gardiens et des prisonniers d\'une prison.', 9),
(21, 'The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', 178, 'Un jeune hobbit part en quête d\'un anneau magique.', 10),
(22, 'The Lord of the Rings: The Two Towers', '2002-12-18', 179, 'Les aventures du hobbit Frodon et de ses compagnons se poursuivent.', 10),
(23, 'The Lord of the Rings: The Return of the King', '2003-12-17', 201, 'La bataille finale pour la Terre du Milieu.', 10),
(24, 'The Hobbit: An Unexpected Journey', '2012-12-12', 169, 'Le hobbit Bilbo Baggins part à l\'aventure avec une compagnie de nains.', 4),
(25, 'The Hobbit: The Desolation of Smaug', '2013-12-11', 161, 'Bilbo et les nains affrontent le dragon Smaug.', 4),
(26, 'The Hobbit: The Battle of the Five Armies', '2014-12-17', 144, 'La bataille finale pour la Montagne Solitaire.', 4),
(27, 'The Curious Case of Benjamin Button', '2008-12-25', 166, 'Un homme naît vieux et rajeunit au fil des ans.', 10),
(28, 'Titanic', '1997-12-19', 195, 'L\'histoire d\'amour entre Jack et Rose à bord du Titanic.', 10),
(29, 'The Aviator', '2004-12-17', 170, 'La vie du magnat de l\'aviation Howard Hughes.', 1),
(30, 'The Departed', '2006-10-06', 151, 'Un policier infiltré et un criminel se livrent une guerre sans merci.', 1),
(31, 'The Wolf of Wall Street', '2013-12-25', 180, 'L\'ascension et la chute du courtier en bourse Jordan Belfort.', 1),
(32, 'Ocean\'s Eleven', '2001-12-07', 116, 'Un groupe de braqueurs tente de voler trois casinos en une nuit.', 2),
(33, 'Ocean\'s Twelve', '2004-12-10', 125, 'Un voleur doit rembourser un casino en volant des œuvres d\'art.', 2),
(34, 'Ocean\'s Thirteen', '2007-06-08', 122, 'Un groupe de braqueurs se venge d\'un propriétaire de casino.', 3),
(35, 'Erin Brockovich', '2000-03-17', 131, 'Une mère célibataire se bat contre une compagnie d\'énergie.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `film_genres`
--

CREATE TABLE `film_genres` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `film_genres`
--

INSERT INTO `film_genres` (`id_film`, `id_genre`) VALUES
(1, 1),
(14, 1),
(18, 1),
(24, 1),
(35, 1),
(2, 2),
(13, 2),
(16, 2),
(21, 2),
(33, 2),
(2, 3),
(14, 3),
(16, 3),
(19, 3),
(29, 3),
(30, 3),
(31, 3),
(17, 4),
(21, 4),
(23, 4),
(1, 5),
(6, 5),
(8, 5),
(11, 5),
(16, 5),
(18, 5),
(26, 5),
(29, 5),
(30, 5),
(9, 6),
(17, 6),
(25, 6),
(34, 6),
(4, 7),
(5, 7),
(19, 7),
(21, 7),
(26, 7),
(27, 7),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(11, 8),
(24, 8),
(35, 8),
(10, 9),
(12, 9),
(14, 9),
(22, 9),
(24, 9),
(31, 9),
(2, 10),
(5, 10),
(8, 10),
(18, 10),
(22, 10),
(28, 10),
(3, 11),
(4, 11),
(10, 11),
(11, 11),
(15, 11),
(20, 11),
(27, 11),
(28, 11),
(29, 11),
(1, 12),
(3, 12),
(8, 12),
(9, 12),
(15, 12),
(18, 12),
(20, 12),
(2, 13),
(7, 13),
(12, 13),
(30, 13),
(32, 13),
(33, 13),
(35, 13),
(6, 14),
(9, 14),
(10, 14),
(19, 14),
(27, 14),
(33, 14),
(34, 14),
(35, 14),
(4, 15),
(13, 15),
(15, 15),
(17, 15),
(22, 15),
(28, 15),
(30, 15),
(32, 15),
(35, 15),
(11, 17),
(16, 17),
(20, 17),
(22, 17),
(23, 17),
(25, 17),
(28, 17),
(33, 17),
(35, 17),
(6, 18),
(19, 18),
(21, 18),
(25, 18),
(3, 19),
(5, 19),
(12, 19),
(13, 19),
(16, 19),
(17, 19),
(22, 19),
(23, 19),
(34, 19),
(4, 20),
(26, 20),
(33, 20),
(3, 21),
(6, 21),
(8, 21),
(12, 21),
(18, 21),
(24, 21),
(25, 21),
(32, 21);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `nom_genre` varchar(255) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Comédie'),
(4, 'Drame'),
(5, 'Fantastique'),
(6, 'Science-fiction'),
(7, 'Thriller'),
(8, 'Horreur'),
(9, 'Romance'),
(10, 'Animation'),
(11, 'Biographie'),
(12, 'Documentaire'),
(13, 'Musical'),
(14, 'Mystère'),
(15, 'Guerre'),
(16, 'Western'),
(17, 'Policier'),
(18, 'Historique'),
(19, 'Sport'),
(20, 'Famille'),
(21, 'Fantasy');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `prenom`, `nom`, `sexe`, `date_naissance`) VALUES
(1, 'Al', 'Pacino', 'M', '1940-04-25'),
(2, 'Andy', 'Lau', 'M', '1961-09-27'),
(3, 'Angelina', 'Jolie', 'F', '1975-06-04'),
(4, 'Arnold', 'Schwarzenegger', 'M', '1947-07-30'),
(5, 'Brad', 'Pitt', 'M', '1963-12-18'),
(6, 'Bruce', 'Willis', 'M', '1955-03-19'),
(7, 'Cate', 'Blanchett', 'F', '1969-05-14'),
(8, 'Chow', 'Yun-Fat', 'M', '1955-05-18'),
(9, 'Clint', 'Eastwood', 'M', '1930-05-31'),
(10, 'Denzel', 'Washington', 'M', '1954-12-28'),
(11, 'George', 'Clooney', 'M', '1961-05-06'),
(12, 'Gong', 'Li', 'F', '1965-12-31'),
(13, 'Harrison', 'Ford', 'M', '1942-07-13'),
(14, 'Haruma', 'Miura', 'M', '1990-04-05'),
(15, 'Hiroyuki', 'Sanada', 'M', '1960-10-12'),
(16, 'Jackie', 'Chan', 'M', '1954-04-07'),
(17, 'James', 'Cameron', 'M', '1954-08-16'),
(18, 'Jet', 'Li', 'M', '1963-04-26'),
(19, 'Johnny', 'Depp', 'M', '1963-06-09'),
(20, 'Julia', 'Roberts', 'F', '1967-10-28'),
(21, 'Jun', 'Matsumoto', 'M', '1983-08-30'),
(22, 'Kate', 'Winslet', 'F', '1975-10-05'),
(23, 'Kazunari', 'Ninomiya', 'M', '1983-06-17'),
(24, 'Kazuya', 'Kamenashi', 'M', '1986-02-23'),
(25, 'Ken', 'Watanabe', 'M', '1959-10-21'),
(26, 'Ko', 'Shibasaki', 'F', '1981-08-05'),
(27, 'Koji', 'Yakusho', 'M', '1956-01-01'),
(28, 'Kou', 'Shibasaki', 'F', '1981-08-05'),
(29, 'Leonardo', 'DiCaprio', 'M', '1974-11-11'),
(30, 'Lucy', 'Liu', 'F', '1968-12-02'),
(31, 'Mao', 'Inoue', 'F', '1987-01-09'),
(32, 'Masami', 'Nagasawa', 'F', '1987-06-03'),
(33, 'Meryl', 'Streep', 'F', '1949-06-22'),
(34, 'Michelle', 'Yeoh', 'F', '1962-08-06'),
(35, 'Morgan', 'Freeman', 'M', '1937-06-01'),
(36, 'Nicole', 'Kidman', 'F', '1967-06-20'),
(37, 'Quentin', 'Tarantino', 'M', '1963-03-27'),
(38, 'Rinko', 'Kikuchi', 'F', '1981-01-06'),
(39, 'Robert', 'De Niro', 'M', '1943-08-17'),
(40, 'Satoshi', 'Tsumabuki', 'M', '1980-12-13'),
(41, 'Shun', 'Oguri', 'M', '1982-12-26'),
(42, 'Sigourney', 'Weaver', 'F', '1949-10-08'),
(43, 'Stephen', 'Chow', 'M', '1962-06-22'),
(44, 'Steven', 'Spielberg', 'M', '1946-12-18'),
(45, 'Sylvester', 'Stallone', 'M', '1946-07-06'),
(46, 'Tadanobu', 'Asano', 'M', '1973-11-27'),
(47, 'Takayuki', 'Yamada', 'M', '1983-10-20'),
(48, 'Takeru', 'Sato', 'M', '1989-03-21'),
(49, 'Takeshi', 'Kitano', 'M', '1947-01-18'),
(50, 'Takuya', 'Kimura', 'M', '1972-11-13'),
(51, 'Tim', 'Burton', 'M', '1958-08-25'),
(52, 'Tom', 'Cruise', 'M', '1962-07-03'),
(53, 'Tony', 'Leung', 'M', '1962-06-27'),
(54, 'Yui', 'Aragaki', 'F', '1988-06-11'),
(55, 'Yusuke', 'Iseya', 'M', '1976-05-29'),
(56, 'Zhang', 'Ziyi', 'F', '1979-02-09');

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `id_realisateur` int NOT NULL,
  `id_personne` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
(1, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8),
(6, 9),
(8, 15),
(9, 23),
(10, 24);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nom_personnage` varchar(255) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_personnage`) VALUES
(1, 'Angelica'),
(2, 'Barbossa'),
(3, 'Benji Dunn'),
(4, 'Blackbeard'),
(5, 'Bootstrap Bill'),
(6, 'Claire Phelps'),
(7, 'Cotton'),
(8, 'Cutler Beckett'),
(9, 'Davy Jones'),
(10, 'Elizabeth Swann'),
(11, 'Ethan Hunt'),
(12, 'Eugene Kittridge'),
(13, 'Gibbs'),
(14, 'Ilsa Faust'),
(15, 'Jack Sparrow'),
(16, 'James Norrington'),
(17, 'John Musgrave'),
(18, 'Joshamee Gibbs'),
(19, 'Julia Meade'),
(20, 'Luther Stickell'),
(21, 'Marty'),
(22, 'Mullroy'),
(23, 'Murtogg'),
(24, 'Owen Davian'),
(25, 'Pintel'),
(26, 'Ragetti'),
(27, 'Scratch'),
(28, 'Tia Dalma'),
(29, 'Will Turner'),
(30, 'William Brandt');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id_acteur`),
  ADD UNIQUE KEY `id_personne` (`id_personne`);

--
-- Index pour la table `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`id_acteur`,`id_film`,`id_role`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_realisateur` (`id_realisateur`);

--
-- Index pour la table `film_genres`
--
ALTER TABLE `film_genres`
  ADD PRIMARY KEY (`id_film`,`id_genre`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id_realisateur`),
  ADD UNIQUE KEY `id_personne` (`id_personne`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id_acteur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id_realisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  ADD CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`);

--
-- Contraintes pour la table `film_genres`
--
ALTER TABLE `film_genres`
  ADD CONSTRAINT `film_genres_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `film_genres_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Contraintes pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
