-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Mars 2017 à 18:20
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

-- --------------------------------------------------------

--
-- Structure de la table `driver`
--

CREATE TABLE `driver` (
  `Id` int(5) NOT NULL,
  `Username` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Driving_Year` int(20) NOT NULL,
  `Nb_passenger_total` int(2) NOT NULL,
  `Smoking` tinyint(1) NOT NULL,
  `Air_Conditioning` tinyint(1) NOT NULL,
  `Large_suicase` tinyint(1) NOT NULL,
  `Animals` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `itinerary`
--

CREATE TABLE `itinerary` (
  `Id` int(5) NOT NULL,
  `Departure` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Arrival` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `travel`
--

CREATE TABLE `travel` (
  `Id` int(5) NOT NULL,
  `Date_Departure` date NOT NULL,
  `Driver_user` int(5) NOT NULL,
  `Itin` int(5) NOT NULL,
  `Nb_passenger` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Username` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `First_name` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Address` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Mail` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(12) NOT NULL,
  `Pass_word` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_User` (`Username`);

--
-- Index pour la table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Driver` (`Driver_user`),
  ADD KEY `fk_Itin` (`Itin`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `driver`
--
ALTER TABLE `driver`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `travel`
--
ALTER TABLE `travel`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
