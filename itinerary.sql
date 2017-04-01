-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 01 Avril 2017 à 21:33
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

--
-- Contenu de la table `itinerary`
--

INSERT INTO `itinerary` (`Id`, `Departure`, `Arrival`, `Price`) VALUES
(1, 'Québec', 'Montréal', 20),
(2, 'Québec', 'Chicoutimi', 15),
(3, 'Québec', 'Rimouski', 20),
(4, 'Québec', 'Trois-Rivières', 10),
(5, 'Québec', 'Rivière-du-Loup', 15),
(6, 'Québec', 'Sherbrooke', 15),
(7, 'Québec', 'Alma', 20),
(8, 'Montréal', 'Québec', 20),
(9, 'Montréal', 'Chicoutimi', 35),
(10, 'Montréal', 'Rimouski', 40),
(11, 'Montréal', 'Trois-Rivières', 10),
(12, 'Montréal', 'Rivière-du-Loup', 35),
(13, 'Montréal', 'Sherbrooke', 10),
(14, 'Montréal', 'Alma', 40),
(15, 'Chicoutimi', 'Québec', 20),
(16, 'Chicoutimi', 'Montréal', 35),
(17, 'Chicoutimi', 'Rimouski', 35),
(18, 'Chicoutimi', 'Trois-Rivières', 25),
(19, 'Chicoutimi', 'Rivière-du-Loup', 30),
(20, 'Chicoutimi', 'Sherbrooke', 30),
(21, 'Chicoutimi', 'Alma', 10),
(22, 'Rimouski', 'Québec', 20),
(23, 'Rimouski', 'Montréal', 35),
(24, 'Rimouski', 'Chicoutimi', 40),
(25, 'Rimouski', 'Trois-Rivières', 30),
(26, 'Rimouski', 'Rivière-du-Loup', 10),
(27, 'Rimouski', 'Sherbrooke', 35),
(28, 'Rimouski', 'Alma', 35),
(29, 'Trois-Rivières', 'Québec', 10),
(30, 'Trois-Rivières', 'Montréal', 10),
(31, 'Trois-Rivières', 'Chicoutimi', 25),
(32, 'Trois-Rivières', 'Rimouski', 30),
(33, 'Trois-Rivières', 'Rivière-du-Loup', 20),
(34, 'Trois-Rivières', 'Sherbrooke', 10),
(35, 'Trois-Rivières', 'Alma', 30),
(36, 'Rivière-du-Loup', 'Québec', 10),
(37, 'Rivière-du-Loup', 'Montréal', 10),
(38, 'Rivière-du-Loup', 'Chicoutimi', 30),
(39, 'Rivière-du-Loup', 'Rimouski', 10),
(40, 'Rivière-du-Loup', 'Trois-Rivières', 35),
(41, 'Rivière-du-Loup', 'Sherbrooke', 25),
(42, 'Rivière-du-Loup', 'Alma', 35),
(43, 'Sherbrooke', 'Québec', 10),
(44, 'Sherbrooke', 'Montréal', 10),
(45, 'Sherbrooke', 'Chicoutimi', 25),
(46, 'Sherbrooke', 'Rimouski', 30),
(47, 'Sherbrooke', 'Trois-Rivières', 10),
(48, 'Sherbrooke', 'Rivière-du-Loup', 25),
(49, 'Sherbrooke', 'Alma', 30),
(50, 'Alma', 'Québec', 20),
(51, 'Alma', 'Montréal', 40),
(52, 'Alma', 'Chicoutimi', 10),
(53, 'Alma', 'Rimouski', 40),
(54, 'Alma', 'Trois-Rivières', 30),
(55, 'Alma', 'Rivière-du-Loup', 35),
(56, 'Alma', 'Sherbrooke', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
