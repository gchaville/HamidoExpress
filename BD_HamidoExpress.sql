-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Avril 2017 à 22:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_hamidoexpress`
--
CREATE DATABASE IF NOT EXISTS `bd_hamidoexpress` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bd_hamidoexpress`;

-- --------------------------------------------------------

--
-- Structure de la table `driver`
--

CREATE TABLE `driver` (
  `Id` int(5) NOT NULL UNIQUE AUTO_INCREMENT,
  `UserId` int(5) NOT NULL UNIQUE,
  `Driving_Year` int(2) NOT NULL,
  `Passenger_Total` int(4) NOT NULL,
  `Smoking` tinyint(1) NOT NULL,
  `Air_Conditioning` tinyint(1) NOT NULL,
  `Large_suicase` tinyint(1) NOT NULL,
  `Animals` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `town`
--

CREATE TABLE `town` (
  `Id` int(5) NOT NULL UNIQUE AUTO_INCREMENT,
  `Name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Country` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `town`
--

INSERT INTO `town` (`Id`, `Name`, `Province`, `Country`) VALUES
(NULL, 'Montréal', 'QC', 'Canada'),
(NULL, 'Québec', 'QC', 'Canada'),
(NULL, 'Trois-Rivières', 'QC', 'Canada'),
(NULL, 'Sherbrooke', 'QC', 'Canada'),
(NULL, 'Saguenay', 'QC', 'Canada'),
(NULL, 'Alma', 'QC', 'Canada'),
(NULL, 'Rivière-du-Loup', 'QC', 'Canada'),
(NULL, 'Rimouski', 'QC', 'Canada'),
(NULL, 'Sept-Îles', 'QC', 'Canada'),
(NULL, 'Gaspé', 'QC', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `travel`
--

CREATE TABLE `travel` (
  `Id` int(5) NOT NULL UNIQUE AUTO_INCREMENT,
  `DriverId` int(5) NOT NULL,
  `DepartureId` int(5) NOT NULL,
  `ArrivalId` int(5) NOT NULL,
  `Date` datetime NOT NULL,
  `Price` int(3) NOT NULL,
  `Places_Available` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `travel_supports_user`
--

CREATE TABLE `travel_supports_user` (
  `TravelId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id` int(5) NOT NULL UNIQUE AUTO_INCREMENT,
  `Username` varchar(15) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  `First_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Address` text(250) COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  `Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  `Pass_word` varchar(250) COLLATE utf8_unicode_ci NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Id`, `UserId`),
  ADD FOREIGN KEY (`UserId`) REFERENCES `users`(`Id`);

--
-- Index pour la table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`Id`),
  ADD FOREIGN KEY (`DriverId`) REFERENCES `driver`(`Id`),
  ADD FOREIGN KEY (`DepartureId`) REFERENCES `town`(`Id`),
  ADD FOREIGN KEY (`ArrivalId`) REFERENCES `town`(`Id`);

--
-- Index pour la table `travel_supports_user`
--
ALTER TABLE `travel_supports_user`
  ADD PRIMARY KEY (`TravelId`,`UserId`),
  ADD FOREIGN KEY (`TravelId`) REFERENCES `travel`(`Id`),
  ADD FOREIGN KEY (`UserId`) REFERENCES `users`(`Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`,`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
