-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 avr. 2024 à 18:37
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `doctorants`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctorants`
--

DROP TABLE IF EXISTS `doctorants`;
CREATE TABLE IF NOT EXISTS `doctorants` (
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `doctorants`
--

INSERT INTO `doctorants` (`email`, `prenom`, `nom`, `password`) VALUES
('assalanass12@gmail.com', 'anass', 'assal', '5f6c48b4e33d5865bacb5fd46b3f52f2'),
('maroc2oussama2touijer@gmail.com', 'OUSSAMA', 'TOUIJER', '0913cebdfbf661832977ca9bbddcf076'),
('oussama5touijer@gmail.com', 'OUSSAMA', 'TOUIJER', 'b59c67bf196a4758191e42f76670ceba');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
