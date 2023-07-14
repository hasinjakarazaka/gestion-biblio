-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 juil. 2023 à 07:34
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `auteur` text NOT NULL,
  `synopsis` text NOT NULL,
  `img` longblob NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `auteur`, `synopsis`, `img`) VALUES
(2, 'in aaa ay ohhhh', 'rajao', 'abalblablab  blalbala  aaamanmanman', ''),
(4, 'la belle', 'jean', 'je suis a la maison', '');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `CIN` int NOT NULL,
  `nom` text NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` text NOT NULL,
  `cotisation` double NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`CIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`CIN`, `nom`, `mdp`, `statut`, `cotisation`, `email`) VALUES
(30130111, 'pluton', 'pluton123', 'membre', 800, 'pluton@gmail.com'),
(301031029, 'koto', '55555', 'membre', 10000, ''),
(301031030, 'rabe', '1111111', 'membre', 0, ''),
(301031032, 'grakiii', '7777', 'membre', 8000, 'loadez19@gmail.com'),
(301031088, 'grakiii', '9999', 'membre', 20000, 'loadez19@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
