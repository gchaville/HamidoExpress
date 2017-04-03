-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 03 Avril 2017 à 19:26
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
  `Id` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `Driving_Year` int(2) NOT NULL,
  `Passenger_Total` int(4) NOT NULL,
  `Smoking` tinyint(1) NOT NULL,
  `Air_Conditioning` tinyint(1) NOT NULL,
  `Large_suicase` tinyint(1) NOT NULL,
  `Animals` tinyint(1) NOT NULL,
  `Cancelling` int(1) DEFAULT '0',
  `Banning_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `driver`
--

INSERT INTO `driver` (`Id`, `UserId`, `Driving_Year`, `Passenger_Total`, `Smoking`, `Air_Conditioning`, `Large_suicase`, `Animals`, `Cancelling`, `Banning_Date`) VALUES
(1, 2, 10, 5, 1, 1, 1, 1, 0, NULL),
(3, 3, 10, 12, 1, 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `town`
--

CREATE TABLE `town` (
  `Id` int(5) NOT NULL,
  `Name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Country` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `town`
--

INSERT INTO `town` (`Id`, `Name`, `Province`, `Country`) VALUES
(1, 'Montréal', 'QC', 'Canada'),
(2, 'Québec', 'QC', 'Canada'),
(3, 'Trois-Rivières', 'QC', 'Canada'),
(4, 'Sherbrooke', 'QC', 'Canada'),
(5, 'Saguenay', 'QC', 'Canada'),
(6, 'Alma', 'QC', 'Canada'),
(7, 'Rivière-du-Loup', 'QC', 'Canada'),
(8, 'Rimouski', 'QC', 'Canada'),
(9, 'Sept-Îles', 'QC', 'Canada'),
(10, 'Gaspé', 'QC', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `travel`
--

CREATE TABLE `travel` (
  `Id` int(5) NOT NULL,
  `DriverId` int(5) NOT NULL,
  `DepartureId` int(5) NOT NULL,
  `ArrivalId` int(5) NOT NULL,
  `Date` date NOT NULL,
  `Schedule` time NOT NULL,
  `Price` int(3) NOT NULL,
  `Places_Available` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `travel`
--

INSERT INTO `travel` (`Id`, `DriverId`, `DepartureId`, `ArrivalId`, `Date`, `Schedule`, `Price`, `Places_Available`) VALUES
(1, 1, 6, 5, '2017-05-02', '08:30:00', 10, 4),
(2, 1, 6, 8, '2017-04-02', '08:30:00', 10, 2),
(3, 1, 2, 10, '2018-12-25', '20:30:00', 40, 1),
(4, 1, 6, 5, '2017-06-15', '15:30:00', 100, 3),
(5, 1, 6, 5, '2017-04-02', '08:30:00', 10, 5),
(6, 1, 6, 9, '2015-12-12', '08:30:00', 10, 2),
(7, 3, 6, 8, '2018-05-12', '08:30:00', 10, 6),
(8, 3, 6, 10, '2005-05-12', '08:30:00', 50, 5);

-- --------------------------------------------------------

--
-- Structure de la table `travel_supports_user`
--

CREATE TABLE `travel_supports_user` (
  `Id` int(5) NOT NULL,
  `TravelId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `travel_supports_user`
--

INSERT INTO `travel_supports_user` (`Id`, `TravelId`, `UserId`) VALUES
(8, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id` int(5) NOT NULL,
  `Username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `First_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Pass_word` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Cancelling` int(1) DEFAULT '0',
  `Banning_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`Id`, `Username`, `First_name`, `Last_name`, `Date_of_birth`, `Address`, `Mail`, `Phone`, `Pass_word`, `Cancelling`, `Banning_Date`) VALUES
(1, 'cat0town', 'Gillian', 'Chaville', '1996-12-02', '818, rue thomas edison \r\nchicoutimi, QC\r\nG7H 6H3', 'gillian.chaville@gmail.com', '4183765631', '$2y$10$1cCnVIRBj2HX8RvjSMN/f.d3mbYWtLtCyfYsmfEQMA3MiS69C/K5C', 2, NULL),
(2, 'testdriver', 'Driver', 'Test', '1990-02-01', '111, rue du Conducteur Test\r\nTestVille, NW\r\n', 'test_driver@gmail.com', '1111111111', '$2y$10$jWMzRrUyzUpWJy9vtWqo4Oc3Ab3CBLLJgd85V38QPyh/kg.lg7hxW', 0, NULL),
(3, 'testdriver2', 'Driver', 'Test2', '1111-11-11', '1111, rue du Drive\r\nDriveTown, NW\r\n', '111111@gmail.com', '4111111125', '$2y$10$CL5v7TiE1gmE/ALXJ.sW/.5NQVbCmTEx508jXibAW1fyuJ/W3c/5y', 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Id`,`UserId`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- Index pour la table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Index pour la table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `fk_driver_id` (`DriverId`),
  ADD KEY `fk_departure_id` (`DepartureId`),
  ADD KEY `fk_arrival_id` (`ArrivalId`);

--
-- Index pour la table `travel_supports_user`
--
ALTER TABLE `travel_supports_user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_travelU_id` (`TravelId`),
  ADD KEY `fk_userT_id` (`UserId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Pass_word` (`Pass_word`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `driver`
--
ALTER TABLE `driver`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `town`
--
ALTER TABLE `town`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `travel`
--
ALTER TABLE `travel`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `travel_supports_user`
--
ALTER TABLE `travel_supports_user`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `fk_arrival_id` FOREIGN KEY (`ArrivalId`) REFERENCES `town` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_departure_id` FOREIGN KEY (`DepartureId`) REFERENCES `town` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_driver_id` FOREIGN KEY (`DriverId`) REFERENCES `driver` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `travel_supports_user`
--
ALTER TABLE `travel_supports_user`
  ADD CONSTRAINT `fk_travelU_id` FOREIGN KEY (`TravelId`) REFERENCES `travel` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userT_id` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
