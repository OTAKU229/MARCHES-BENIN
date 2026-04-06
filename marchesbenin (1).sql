-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 avr. 2026 à 18:49
-- Version du serveur : 9.1.0
-- Version de PHP : 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marchesbenin`
--

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
CREATE TABLE IF NOT EXISTS `emplacement` (
  `idEmplacement` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) NOT NULL,
  `idMarche` int DEFAULT NULL,
  `idType` int DEFAULT NULL,
  PRIMARY KEY (`idEmplacement`),
  KEY `idMarche` (`idMarche`),
  KEY `idType` (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marche`
--

DROP TABLE IF EXISTS `marche`;
CREATE TABLE IF NOT EXISTS `marche` (
  `idMarche` int NOT NULL AUTO_INCREMENT,
  `nomMarche` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `capacite` int NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `idVille` int DEFAULT NULL,
  PRIMARY KEY (`idMarche`),
  KEY `idVille` (`idVille`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marche`
--

INSERT INTO `marche` (`idMarche`, `nomMarche`, `description`, `capacite`, `adresse`, `telephone`, `image`, `idVille`) VALUES
(1, 'Gbégamey', 'Marché moderne', 2000, 'Vers UATM GASA', '01289058', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-IwGjD5wCWuK3Sll2Ct7_yiQn1vjyj6MoPQ&s', 4),
(2, 'Mènontin', 'Marché moderne', 10000, 'Connais pas', '012908378', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0HTAQPvplASjBgXUxF3PDteqWILr7azzZnw&s', 1),
(6, 'Togblé', 'Marché Moderne', 2000, 'Connais pas', '0130908345', 'images/2026-02-25.11-01-54.jpeg', 1),
(4, 'Cadjèhoun', 'Marché moderne', 1200, 'Connais pas', '0139904890', 'images/20260225075251.jpg', 2),
(7, 'Togoudo', 'Marché Moderne', 2000, 'Connais pas', '0130908345', 'images/2026-02-26.00-11-52.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typeemplacement`
--

DROP TABLE IF EXISTS `typeemplacement`;
CREATE TABLE IF NOT EXISTS `typeemplacement` (
  `idType` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(50) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`) VALUES
(1, 'Cotonou'),
(2, 'Cotonou'),
(4, 'Calavi'),
(6, 'Akpakpa1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
